const products = {
  maleTshirt: {
    label: "Férfi póló",
    folder: "Férfi póló",
    filePrefix: "férfi",
    defaultColor: "gray",
  },
  malePolo: {
    label: "Férfi galléros póló",
    folder: "Férfi galléros póló",
    filePrefix: "férfi-galléros",
    defaultColor: "gray",
  },
  femaleTshirt: {
    label: "Női póló",
    folder: "Női póló",
    filePrefix: "női-póló",
    defaultColor: "gray",
  },
  femalePolo: {
    label: "Női galléros póló",
    folder: "Női galléros póló",
    filePrefix: "női-galléros",
    defaultColor: "gray",
  },
};

const colorLabels = {
  black: "Fekete",
  white: "Fehér",
  gray: "Szürke",
  blue: "Kék",
  red: "Piros",
};

const colorFileNames = {
  black: "fekete",
  white: "fehér",
  gray: "szürke",
  blue: "kék",
  red: "piros",
};

const viewLabels = {
  front: "eleje",
  back: "háta",
  side: "oldala",
};

const sideLogoTransform =
  "translate(-50%, -50%) perspective(520px) rotateY(42deg) rotateZ(-2deg)";

const slimSideLogoTransform =
  "translate(-50%, -50%) perspective(520px) rotateY(44deg) rotateZ(-2deg)";

const femaleTshirtSideLogoTransform =
  "translate(-50%, -50%) perspective(440px) rotateY(58deg) rotateZ(-4deg)";

// Edit logo placement here. Bigger top moves down, bigger left moves right.
// width makes the logo larger/smaller. There are no hidden corrections below.
const logoPositions = {
  maleTshirt: {
    black: {
      front: { top: "23%", left: "62%", width: "14%" },
      back: { top: "25%", left: "52%", width: "48%" },
      side: {
        top: "33%",
        left: "80%",
        width: "11%",
        transform: sideLogoTransform,
      },
    },
    white: {
      front: { top: "23%", left: "62%", width: "14%" },
      back: { top: "25%", left: "52%", width: "48%" },
      side: {
        top: "32%",
        left: "80%",
        width: "11%",
        transform: sideLogoTransform,
      },
    },
    gray: {
      front: { top: "23%", left: "62%", width: "14%" },
      back: { top: "25%", left: "52%", width: "48%" },
      side: {
        top: "31%",
        left: "79%",
        width: "11%",
        transform: sideLogoTransform,
      },
    },
    blue: {
      front: { top: "23%", left: "62%", width: "14%" },
      back: { top: "25%", left: "52%", width: "48%" },
      side: {
        top: "33%",
        left: "80%",
        width: "11%",
        transform: sideLogoTransform,
      },
    },
    red: {
      front: { top: "23%", left: "62%", width: "14%" },
      back: { top: "25%", left: "52%", width: "48%" },
      side: {
        top: "32%",
        left: "80%",
        width: "11%",
        transform: sideLogoTransform,
      },
    },
  },
  malePolo: {
    black: {
      front: { top: "29%", left: "64%", width: "13%" },
      back: { top: "25%", left: "52%", width: "47%" },
      side: {
        top: "33%",
        left: "80%",
        width: "10%",
        transform: sideLogoTransform,
      },
    },
    white: {
      front: { top: "29%", left: "64%", width: "13%" },
      back: { top: "25%", left: "52%", width: "47%" },
      side: {
        top: "33%",
        left: "80%",
        width: "10%",
        transform: sideLogoTransform,
      },
    },
    gray: {
      front: { top: "29%", left: "64%", width: "13%" },
      back: { top: "25%", left: "52%", width: "47%" },
      side: {
        top: "33%",
        left: "80%",
        width: "10%",
        transform: sideLogoTransform,
      },
    },
    blue: {
      front: { top: "29%", left: "64%", width: "13%" },
      back: { top: "25%", left: "52%", width: "47%" },
      side: {
        top: "33%",
        left: "80%",
        width: "10%",
        transform: sideLogoTransform,
      },
    },
    red: {
      front: { top: "29%", left: "64%", width: "13%" },
      back: { top: "25%", left: "52%", width: "47%" },
      side: {
        top: "33%",
        left: "80%",
        width: "10%",
        transform: sideLogoTransform,
      },
    },
  },
  femaleTshirt: {
    black: {
      front: { top: "28%", left: "62%", width: "13%" },
      back: { top: "26%", left: "51%", width: "40%" },
      side: {
        top: "21%",
        left: "77%",
        width: "10.5%",
        transform: femaleTshirtSideLogoTransform,
      },
    },
    white: {
      front: { top: "28%", left: "62%", width: "13%" },
      back: { top: "26%", left: "51%", width: "40%" },
      side: {
        top: "24%",
        left: "78%",
        width: "10.5%",
        transform: femaleTshirtSideLogoTransform,
      },
    },
    gray: {
      front: { top: "28%", left: "62%", width: "13%" },
      back: { top: "26%", left: "51%", width: "40%" },
      side: {
        top: "21%",
        left: "75%",
        width: "10.5%",
        transform: femaleTshirtSideLogoTransform,
      },
    },
    blue: {
      front: { top: "28%", left: "62%", width: "13%" },
      back: { top: "26%", left: "51%", width: "40%" },
      side: {
        top: "21%",
        left: "77%",
        width: "10.5%",
        transform: femaleTshirtSideLogoTransform,
      },
    },
    red: {
      front: { top: "28%", left: "62%", width: "13%" },
      back: { top: "26%", left: "51%", width: "40%" },
      side: {
        top: "21%",
        left: "77%",
        width: "10.5%",
        transform: femaleTshirtSideLogoTransform,
      },
    },
  },
  femalePolo: {
    black: {
      front: { top: "28%", left: "62%", width: "12%" },
      back: { top: "27%", left: "50%", width: "43%" },
      side: {
        top: "31%",
        left: "75%",
        width: "9%",
        transform: slimSideLogoTransform,
      },
    },
    white: {
      front: { top: "28%", left: "62%", width: "12%" },
      back: { top: "27%", left: "50%", width: "43%" },
      side: {
        top: "31%",
        left: "75%",
        width: "9%",
        transform: slimSideLogoTransform,
      },
    },
    gray: {
      front: { top: "28%", left: "62%", width: "12%" },
      back: { top: "27%", left: "50%", width: "43%" },
      side: {
        top: "31%",
        left: "75%",
        width: "9%",
        transform: slimSideLogoTransform,
      },
    },
    blue: {
      front: { top: "28%", left: "62%", width: "12%" },
      back: { top: "27%", left: "50%", width: "43%" },
      side: {
        top: "31%",
        left: "75%",
        width: "9%",
        transform: slimSideLogoTransform,
      },
    },
    red: {
      front: { top: "28%", left: "62%", width: "12%" },
      back: { top: "27%", left: "50%", width: "43%" },
      side: {
        top: "31.1%",
        left: "75%",
        width: "9%",
        transform: slimSideLogoTransform,
      },
    },
  },
};

// Edit logo realism here. These values only affect how the logo blends into the shirt.
const logoEffects = {
  black: {
    opacity: "0.9",
    mixBlendMode: "screen",
    filter: "contrast(0.92) saturate(0.9) brightness(0.95)",
  },
  white: {
    opacity: "0.88",
    mixBlendMode: "multiply",
    filter: "contrast(0.95) saturate(0.92) brightness(0.98)",
  },
  gray: {
    opacity: "0.9",
    mixBlendMode: "normal",
    filter: "contrast(0.92) saturate(0.88) brightness(0.96)",
  },
  blue: {
    opacity: "0.9",
    mixBlendMode: "normal",
    filter: "contrast(0.92) saturate(0.88) brightness(0.96)",
  },
  red: {
    opacity: "0.9",
    mixBlendMode: "normal",
    filter: "contrast(0.92) saturate(0.88) brightness(0.96)",
  },
};

const sideLogoEffect = {
  opacity: "0.86",
  filter: "contrast(0.9) saturate(0.86) brightness(0.94)",
};

const getLogoEffect = (color, view) => ({
  ...logoEffects[color],
  ...(view === "side" ? sideLogoEffect : {}),
});

const logoImages = {
  default: "/assets/images/common/logo.png",
  white: "/assets/images/common/logo-fekete_Rajzt%C3%A1bla%201.svg",
  red: "/assets/images/logo/logo%20pirosra-03.png",
};

const getLogoImagePath = (color) => logoImages[color] || logoImages.default;

const percentToNumber = (value) => parseFloat(value) / 100;

const buildImagePath = (productKey, color, view) => {
  const product = products[productKey];
  const fileName = `${product.filePrefix}-${colorFileNames[color]}-${viewLabels[view]}.png`;

  return encodeURI(`/assets/images/cloths/${product.folder}/${fileName}`);
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

  const state = {
    product: "maleTshirt",
    color: "gray",
    view: "front",
  };

  const setActive = (buttons, dataName, value) => {
    buttons.forEach((button) => {
      button.classList.toggle("is-active", button.dataset[dataName] === value);
    });
  };

  const getRenderedImageBox = () => {
    const canvasBox = image.parentElement.getBoundingClientRect();

    if (!image.naturalWidth || !image.naturalHeight) {
      return {
        left: 0,
        top: 0,
        width: canvasBox.width,
        height: canvasBox.height,
      };
    }

    const imageRatio = image.naturalWidth / image.naturalHeight;
    const canvasRatio = canvasBox.width / canvasBox.height;

    if (canvasRatio > imageRatio) {
      const height = canvasBox.height;
      const width = height * imageRatio;

      return {
        left: (canvasBox.width - width) / 2,
        top: 0,
        width,
        height,
      };
    }

    const width = canvasBox.width;
    const height = width / imageRatio;

    return {
      left: 0,
      top: (canvasBox.height - height) / 2,
      width,
      height,
    };
  };

  const applyLogoLayout = () => {
    const position = logoPositions[state.product][state.color][state.view];
    const imageBox = getRenderedImageBox();

    logo.style.left = `${imageBox.left + imageBox.width * percentToNumber(position.left)}px`;
    logo.style.top = `${imageBox.top + imageBox.height * percentToNumber(position.top)}px`;
    logo.style.width = `${imageBox.width * percentToNumber(position.width)}px`;
  };

  const render = () => {
    const product = products[state.product];
    const position = logoPositions[state.product][state.color][state.view];
    const effect = getLogoEffect(state.color, state.view);
    const imagePath = buildImagePath(state.product, state.color, state.view);

    image.src = imagePath;
    image.alt = `${colorLabels[state.color]} ${product.label.toLowerCase()} látványterv`;

    logo.src = getLogoImagePath(state.color);
    logo.style.transform = position.transform || "translate(-50%, -50%)";
    logo.style.opacity = effect.opacity;
    logo.style.mixBlendMode = effect.mixBlendMode;
    logo.style.filter = effect.filter;
    applyLogoLayout();

    productLabel.firstChild.textContent = product.label;

    setActive(productButtons, "product", state.product);
    setActive(colorButtons, "color", state.color);
    setActive(viewButtons, "view", state.view);
  };

  image.addEventListener("load", applyLogoLayout);
  window.addEventListener("resize", applyLogoLayout);

  productButtons.forEach((button) => {
    button.addEventListener("click", () => {
      state.product = button.dataset.product;
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

  render();
}
