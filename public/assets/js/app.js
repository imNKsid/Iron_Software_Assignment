/**
 * Smooth scroll for in-page anchors; demo signup forms do not POST (no backend in this task).
 */
(function () {
    const prefersReduced =
        window.matchMedia && window.matchMedia("(prefers-reduced-motion: reduce)").matches;

    document.addEventListener("click", function (e) {
        const t = e.target;
        if (!(t instanceof HTMLAnchorElement)) return;
        const href = t.getAttribute("href");
        if (!href || href.charAt(0) !== "#" || href.length < 2) return;
        const id = href.slice(1);
        const el = document.getElementById(id);
        if (!el) return;
        e.preventDefault();
        el.scrollIntoView({ behavior: prefersReduced ? "auto" : "smooth", block: "start" });
    });

    function bindDemoForms() {
        document.querySelectorAll("[data-iron-demo-form]").forEach(function (form) {
            form.addEventListener("submit", function (e) {
                e.preventDefault();
            });
        });
    }

    if (document.readyState === "loading") {
        document.addEventListener("DOMContentLoaded", bindDemoForms);
    } else {
        bindDemoForms();
    }
})();
