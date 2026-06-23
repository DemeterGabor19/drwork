import { initNavbar } from "./components/navbar.js";
import { initReveal } from "./components/reveal.js";
import { initYear } from "./components/year.js";

document.documentElement.classList.add("js-ready");

initNavbar();
initReveal();
initYear();
