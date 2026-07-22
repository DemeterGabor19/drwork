const messages = {
  hu: {
    static:
      "A statikus előnézetben az űrlap nem küld emailt. WordPress alatt a beküldés automatikusan működni fog.",
    sending: "Küldés folyamatban...",
    success: "Köszönjük, megkaptuk az ajánlatkérést. Hamarosan jelentkezünk.",
    missingName: "Kérlek, add meg a neved.",
    missingEmail: "Kérlek, add meg az email címed.",
    invalidEmail: "Kérlek, érvényes email címet adj meg.",
    missingMessage: "Kérlek, írd le röviden, mire van szükséged.",
    missingConsent: "Kérlek, fogadd el az adatkezelési tájékoztatót.",
    error: "Nem sikerült elküldeni az üzenetet. Kérlek, próbáld újra később.",
  },
  en: {
    static:
      "Email sending is disabled in the static preview. The form will work automatically under WordPress.",
    sending: "Sending...",
    success: "Thank you, we received your request. We'll get back to you soon.",
    missingName: "Please enter your name.",
    missingEmail: "Please enter your email address.",
    invalidEmail: "Please enter a valid email address.",
    missingMessage: "Please briefly describe what you need.",
    missingConsent: "Please accept the Privacy Policy.",
    error: "We couldn't send your message. Please try again later.",
  },
  de: {
    static:
      "Der E-Mail-Versand ist in der statischen Vorschau deaktiviert. Unter WordPress funktioniert das Formular automatisch.",
    sending: "Wird gesendet...",
    success: "Vielen Dank, wir haben Ihre Anfrage erhalten. Wir melden uns bald.",
    missingName: "Bitte geben Sie Ihren Namen ein.",
    missingEmail: "Bitte geben Sie Ihre E-Mail-Adresse ein.",
    invalidEmail: "Bitte geben Sie eine gültige E-Mail-Adresse ein.",
    missingMessage: "Bitte beschreiben Sie kurz, was Sie benötigen.",
    missingConsent: "Bitte akzeptieren Sie die Datenschutzerklärung.",
    error: "Die Nachricht konnte nicht gesendet werden. Bitte versuchen Sie es später erneut.",
  },
};

const getLanguage = () => window.drworkI18n?.language || "hu";
const getMessage = (key) => messages[getLanguage()]?.[key] || messages.hu[key];

const setStatus = (statusElement, message, type = "info") => {
  if (!statusElement) {
    return;
  }

  statusElement.textContent = message;
  statusElement.dataset.status = type;
  statusElement.hidden = false;
};

const clearStatus = (statusElement) => {
  if (!statusElement) {
    return;
  }

  statusElement.textContent = "";
  statusElement.hidden = true;
  delete statusElement.dataset.status;
};

const getEndpoint = (form) => {
  const configuredEndpoint = window.drworkTheme?.contactEndpoint;

  if (configuredEndpoint) {
    return configuredEndpoint;
  }

  const action = form.getAttribute("action");

  if (action && action !== "#") {
    return action;
  }

  return "";
};

const isStaticPreview = () =>
  !window.drworkTheme?.contactEndpoint &&
  ["127.0.0.1", "localhost"].includes(window.location.hostname);

const focusField = (field) => {
  if (field && typeof field.focus === "function") {
    field.focus({ preventScroll: true });
    field.scrollIntoView({ block: "center", behavior: "smooth" });
  }
};

const validateForm = (form) => {
  const name = form.elements.name;
  const email = form.elements.email;
  const message = form.elements.message;
  const consent = form.elements.privacy_consent;

  if (!name?.value.trim()) {
    return { field: name, message: getMessage("missingName") };
  }

  if (!email?.value.trim()) {
    return { field: email, message: getMessage("missingEmail") };
  }

  if (!email.checkValidity()) {
    return { field: email, message: getMessage("invalidEmail") };
  }

  if (!message?.value.trim()) {
    return { field: message, message: getMessage("missingMessage") };
  }

  if (consent && !consent.checked) {
    return { field: consent, message: getMessage("missingConsent") };
  }

  return null;
};

export function initContactForms() {
  document.querySelectorAll("[data-contact-form]").forEach((form) => {
    const statusElement = form.querySelector("[data-form-status]");
    const submitButton = form.querySelector('[type="submit"]');

    form.setAttribute("novalidate", "");

    form.addEventListener("input", () => clearStatus(statusElement));
    form.addEventListener("change", () => clearStatus(statusElement));

    form.addEventListener("submit", async (event) => {
      event.preventDefault();

      const validationError = validateForm(form);

      if (validationError) {
        setStatus(statusElement, validationError.message, "error");
        focusField(validationError.field);
        return;
      }

      const endpoint = getEndpoint(form);

      if (isStaticPreview()) {
        setStatus(statusElement, getMessage("static"), "info");
        return;
      }

      if (!endpoint) {
        setStatus(statusElement, getMessage("error"), "error");
        return;
      }

      const formData = new FormData(form);
      formData.set("language", getLanguage());

      if (formData.get("website")) {
        setStatus(statusElement, getMessage("success"), "success");
        form.reset();
        return;
      }

      submitButton.disabled = true;
      setStatus(statusElement, getMessage("sending"), "info");

      try {
        const response = await fetch(endpoint, {
          method: "POST",
          body: formData,
          credentials: "same-origin",
          headers: {
            Accept: "application/json",
          },
        });
        const payload = await response.json().catch(() => ({}));
        const message = payload?.data?.message || payload?.message;

        if (!response.ok || payload?.success === false) {
          throw new Error(message || getMessage("error"));
        }

        setStatus(statusElement, message || getMessage("success"), "success");
        form.reset();
      } catch (error) {
        setStatus(statusElement, error.message || getMessage("error"), "error");
      } finally {
        submitButton.disabled = false;
      }
    });
  });
}
