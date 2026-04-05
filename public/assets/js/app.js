/**
 * Minimal enhancements: smooth scroll for same-page anchors (respects reduced motion).
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
})();
