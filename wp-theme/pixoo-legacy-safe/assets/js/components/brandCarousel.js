export function initBrandCarousel() {
  const root = document.querySelector("[data-brand-carousel]");

  if (!root) {
    return;
  }

  const cards = [...root.querySelectorAll("[data-brand-card]")];
  const prevButton = root.querySelector("[data-brand-prev]");
  const nextButton = root.querySelector("[data-brand-next]");
  const dotsRoot = root.querySelector("[data-brand-dots]");

  let page = 0;
  let perPage = 3;

  const getPerPage = () => {
    if (window.matchMedia("(max-width: 560px)").matches) {
      return 1;
    }

    if (window.matchMedia("(max-width: 1060px)").matches) {
      return 2;
    }

    return 3;
  };

  const renderDots = (pageCount) => {
    dotsRoot.innerHTML = "";

    for (let index = 0; index < pageCount; index += 1) {
      const dot = document.createElement("button");
      dot.type = "button";
      dot.setAttribute("aria-label", `${index + 1}. oldal`);
      dot.classList.toggle("is-active", index === page);
      dot.addEventListener("click", () => {
        page = index;
        render();
      });
      dotsRoot.append(dot);
    }
  };

  function render() {
    perPage = getPerPage();
    const pageCount = Math.ceil(cards.length / perPage);

    if (page >= pageCount) {
      page = pageCount - 1;
    }

    const start = page * perPage;
    const end = start + perPage;

    cards.forEach((card, index) => {
      card.hidden = index < start || index >= end;
    });

    prevButton.disabled = page === 0;
    nextButton.disabled = page === pageCount - 1;
    renderDots(pageCount);
  }

  prevButton.addEventListener("click", () => {
    page = Math.max(0, page - 1);
    render();
  });

  nextButton.addEventListener("click", () => {
    const pageCount = Math.ceil(cards.length / perPage);
    page = Math.min(pageCount - 1, page + 1);
    render();
  });

  window.addEventListener("resize", render);

  render();
}
