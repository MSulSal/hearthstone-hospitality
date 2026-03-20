(function () {
  const header = document.querySelector(".site-header");
  if (!header) {
    return;
  }

  const toggle = header.querySelector(".site-header__menu-toggle");
  const panel = header.querySelector(".site-header__panel");

  if (!toggle || !panel) {
    return;
  }

  const setExpanded = (expanded) => {
    toggle.setAttribute("aria-expanded", expanded ? "true" : "false");
    header.classList.toggle("is-open", expanded);
  };

  setExpanded(false);

  toggle.addEventListener("click", () => {
    const expanded = toggle.getAttribute("aria-expanded") === "true";
    setExpanded(!expanded);
  });

  panel.querySelectorAll("a").forEach((link) => {
    link.addEventListener("click", () => {
      if (window.matchMedia("(max-width: 768px)").matches) {
        setExpanded(false);
      }
    });
  });

  window.addEventListener("resize", () => {
    if (!window.matchMedia("(max-width: 768px)").matches) {
      setExpanded(false);
    }
  });
})();
