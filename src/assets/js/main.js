import { initBrandCarousel } from "./components/brandCarousel.js";
import { initI18n } from "./components/i18n.js?v=20260721-language-fix2";
import { initNavbar } from "./components/navbar.js";
import { initMockupBuilder } from "./components/mockup.js";
import { initReveal } from "./components/reveal.js";
import { initYear } from "./components/year.js";

document.documentElement.classList.add("js-ready");

initI18n();
initBrandCarousel();
initNavbar();
initMockupBuilder();
initReveal();
initYear();
