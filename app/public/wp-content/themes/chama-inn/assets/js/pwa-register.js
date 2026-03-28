(function () {
  if (!("serviceWorker" in navigator)) {
    return;
  }

  const config = window.chamaPwaConfig || {};
  const serviceWorkerUrl = String(config.serviceWorkerUrl || "").trim();
  const configuredCachePrefix = String(config.cachePrefix || "").trim();
  const cachePrefix = configuredCachePrefix || "guest-app";
  const cachePrefixLegacy = "chama-stay";

  if (!serviceWorkerUrl) {
    return;
  }

  window.addEventListener("load", () => {
    const isAdminToolbarVisible =
      Boolean(document.body && document.body.classList.contains("admin-bar")) ||
      Boolean(document.documentElement && document.documentElement.classList.contains("wp-toolbar"));

    if (isAdminToolbarVisible) {
      navigator.serviceWorker.getRegistrations().then((registrations) => {
        registrations.forEach((registration) => registration.unregister());
      });

      if ("caches" in window) {
        caches.keys().then((cacheKeys) => {
          cacheKeys.forEach((cacheKey) => {
            if (cacheKey.indexOf(cachePrefix + "-v") === 0 || cacheKey.indexOf(cachePrefixLegacy + "-v") === 0) {
              caches.delete(cacheKey);
            }
          });
        });
      }

      return;
    }

    navigator.serviceWorker
      .register(serviceWorkerUrl, { scope: "/" })
      .catch(() => {
        // Silently fail so the stay app keeps working even when SW registration is blocked.
      });
  });
})();
