const mockups = {
  tshirt: {
    label: "Póló",
    defaultColor: "black",
    colors: {
      black: {
        front: "/assets/images/cloths/fekete%20p%C3%B3l%C3%B3%20eleje.png",
        back: "/assets/images/cloths/fekete%20p%C3%B3l%C3%B3%20h%C3%A1tulja.png",
      },
      white: {
        front: "/assets/images/cloths/feh%C3%A9r%20p%C3%B3l%C3%B3%20eleje.png",
        back: "/assets/images/cloths/feh%C3%A9r%20p%C3%B3l%C3%B3%20h%C3%A1tulja.png",
      },
      gray: {
        front: "/assets/images/cloths/sz%C3%BCrke%20p%C3%B3l%C3%B3%20eleje.png",
        back: "/assets/images/cloths/sz%C3%BCrke%20p%C3%B3l%C3%B3%20h%C3%A1tulja.png",
      },
      red: {
        front: "/assets/images/cloths/piros%20p%C3%B3l%C3%B3%20eleje.png",
        back: "/assets/images/cloths/piros%20p%C3%B3l%C3%B3%20h%C3%A1tulja.png",
      },
      blue: {
        front: "/assets/images/cloths/k%C3%A9k%20p%C3%B3l%C3%B3%20eleje.png",
        back: "/assets/images/cloths/Untitled-1.png",
      },
    },
  },
  polo: {
    label: "Galléros póló",
    defaultColor: "white",
    colors: {
      white: {
        front: "/assets/images/cloths/feh%C3%A9r%20gall%C3%A9ros%20p%C3%B3l%C3%B3%20eleje.png",
        back: "/assets/images/cloths/feh%C3%A9r%20gall%C3%A9ros%20p%C3%B3l%C3%B3%20h%C3%A1tulja.png",
      },
    },
  },
};

const logoPositions = {
  tshirt: {
    front: {
      leftChest: { top: "36%", left: "57%", width: "15%" },
      rightChest: { top: "36%", left: "43%", width: "15%" },
      center: { top: "43%", left: "50%", width: "30%" },
    },
    back: {
      backCenter: { top: "36%", left: "50%", width: "34%" },
    },
  },
  polo: {
    front: {
      leftChest: { top: "38%", left: "57%", width: "14%" },
      rightChest: { top: "38%", left: "43%", width: "14%" },
      center: { top: "45%", left: "50%", width: "28%" },
    },
    back: {
      backCenter: { top: "37%", left: "50%", width: "32%" },
    },
  },
};

const colorLabels = {
  black: "Fekete",
  white: "Fehér",
  gray: "Szürke",
  red: "Piros",
  blue: "Kék",
};

export function initMockupBuilder() {
  const root = document.querySelector("[data-mockup-builder]");

  if (!root) {
    return;
  }

  const image = root.querySelector("[data-mockup-image]");
  const logo = root.querySelector("[data-mockup-logo]");
  const productLabel = root.querySelector("[data-product-label]");
  const productButtons = [...root.querySelectorAll("[data-product]")];
  const colorButtons = [...root.querySelectorAll("[data-color]")];
  const viewButtons = [...root.querySelectorAll("[data-view]")];
  const placementButtons = [...root.querySelectorAll("[data-placement]")];

  const state = {
    product: "tshirt",
    color: "black",
    view: "front",
    placement: "leftChest",
  };

  const setActive = (buttons, dataName, value) => {
    buttons.forEach((button) => {
      button.classList.toggle("is-active", button.dataset[dataName] === value);
    });
  };

  const getProduct = () => mockups[state.product];

  const normalizeState = () => {
    const product = getProduct();

    if (!product.colors[state.color]) {
      state.color = product.defaultColor;
    }

    if (!product.colors[state.color][state.view]) {
      state.view = "front";
    }

    if (state.view === "back") {
      state.placement = "backCenter";
    }

    if (state.view === "front" && state.placement === "backCenter") {
      state.placement = "leftChest";
    }
  };

  const updateColorAvailability = () => {
    const availableColors = getProduct().colors;

    colorButtons.forEach((button) => {
      const isAvailable = Boolean(availableColors[button.dataset.color]);
      button.disabled = !isAvailable;
      button.title = isAvailable ? colorLabels[button.dataset.color] : "Ehhez a termékhez nem elérhető";
    });
  };

  const updatePlacementAvailability = () => {
    placementButtons.forEach((button) => {
      const isBackOnly = button.dataset.placement === "backCenter";
      button.disabled = state.view === "front" ? isBackOnly : !isBackOnly;
    });
  };

  const render = () => {
    normalizeState();

    const product = getProduct();
    const imagePath = product.colors[state.color][state.view];
    const position = logoPositions[state.product][state.view][state.placement];

    image.src = imagePath;
    image.alt = `${colorLabels[state.color]} ${product.label.toLowerCase()} látványterv`;

    logo.style.top = position.top;
    logo.style.left = position.left;
    logo.style.width = position.width;

    productLabel.firstChild.textContent = product.label;

    setActive(productButtons, "product", state.product);
    setActive(colorButtons, "color", state.color);
    setActive(viewButtons, "view", state.view);
    setActive(placementButtons, "placement", state.placement);

    updateColorAvailability();
    updatePlacementAvailability();
  };

  productButtons.forEach((button) => {
    button.addEventListener("click", () => {
      state.product = button.dataset.product;
      state.color = button.dataset.defaultColor || getProduct().defaultColor;
      render();
    });
  });

  colorButtons.forEach((button) => {
    button.addEventListener("click", () => {
      state.color = button.dataset.color;
      render();
    });
  });

  viewButtons.forEach((button) => {
    button.addEventListener("click", () => {
      state.view = button.dataset.view;
      render();
    });
  });

  placementButtons.forEach((button) => {
    button.addEventListener("click", () => {
      state.placement = button.dataset.placement;
      render();
    });
  });

  render();
}
