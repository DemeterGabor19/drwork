export function initYear() {
  const yearTarget = document.getElementById("year");

  if (!yearTarget) {
    return;
  }

  yearTarget.textContent = String(new Date().getFullYear());
}
