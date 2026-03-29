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
    syncHeaderMetrics();
  };

  const syncHeaderMetrics = () => {
    const height = Math.ceil(header.getBoundingClientRect().height);
    document.documentElement.style.setProperty(
      "--hearthstone-header-height",
      `${height}px`
    );
  };

  setExpanded(false);
  syncHeaderMetrics();

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

    syncHeaderMetrics();
  });

  const homeHero = document.querySelector(".home-hero[data-gallery]");
  if (!homeHero) {
    return;
  }

  const galleryItems = String(homeHero.getAttribute("data-gallery") || "")
    .split("|")
    .map((item) => item.trim())
    .filter((item) => item.length > 0);

  if (galleryItems.length < 2) {
    return;
  }

  let currentIndex = 0;

  window.setInterval(() => {
    currentIndex = (currentIndex + 1) % galleryItems.length;
    homeHero.style.backgroundImage = `url("${galleryItems[currentIndex]}")`;
  }, 6500);
})();
