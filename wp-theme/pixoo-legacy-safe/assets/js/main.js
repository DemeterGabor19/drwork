import { initBrandCarousel } from "./components/brandCarousel.js";
import { initI18n } from "./components/i18n.js?v=20260721-language-stable";
import { initNavbar } from "./components/navbar.js";
import { initMockupBuilder } from "./components/mockup.js";
import { initReveal } from "./components/reveal.js";
import { initYear } from "./components/year.js";

document.documentElement.classList.add("js-ready");

initBrandCarousel();
initI18n();
initNavbar();
initMockupBuilder();
initReveal();
initYear();
