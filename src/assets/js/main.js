import { initBrandCarousel } from "./components/brandCarousel.js";
import { initNavbar } from "./components/navbar.js";
import { initMockupBuilder } from "./components/mockup.js";
import { initReveal } from "./components/reveal.js";
import { initYear } from "./components/year.js";

document.documentElement.classList.add("js-ready");

initBrandCarousel();
initNavbar();
initMockupBuilder();
initReveal();
initYear();
