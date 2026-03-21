(function () {
  if (!("serviceWorker" in navigator)) {
    return;
  }

  const config = window.chamaPwaConfig || {};
  const serviceWorkerUrl = String(config.serviceWorkerUrl || "").trim();

  if (!serviceWorkerUrl) {
    return;
  }

  window.addEventListener("load", () => {
    navigator.serviceWorker
      .register(serviceWorkerUrl, { scope: "/" })
      .catch(() => {
        // Silently fail so the stay app keeps working even when SW registration is blocked.
      });
  });
})();
