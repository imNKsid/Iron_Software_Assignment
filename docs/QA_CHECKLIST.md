# QA checklist — IronPDF for C++ landing page (assignment)

Use this list when validating the submission before hand-off. Check both **local** (`php spark serve`) and, if applicable, a **staging** URL with HTTPS.

## 1. Pixel alignment and spacing (vs Figma)

- [ ] Open the Figma file and compare global margins: container max-width vs design frames (this build uses `nl-container` at 72rem).
- [ ] Hero: column balance, vertical rhythm between eyebrow / H1 / lead / buttons, and image aspect ratio (SVG dimensions match `content.json` width/height).
- [ ] Cards (features): equal height at desktop; consistent internal padding (`card-body`).
- [ ] Stats band: padding top/bottom matches the intended visual weight; text alignment vs design.
- [ ] CTA panel: border radius, padding, and gradient subtlety vs Figma background treatment.
- [ ] Footer: column gaps and typography scale (uppercase column titles use `nl-letter-spacing`).

## 2. Typography

- [ ] **Inter** loads (Network tab: `fonts.googleapis.com` / `gstatic`); fallbacks apply if blocked.
- [ ] Heading order: single `h1` on the page; section titles use `h2`/`h3` consistently.
- [ ] Line length for body copy: hero lead and feature bodies remain readable (roughly 45–75 characters per line where applicable).

## 3. Responsiveness (breakpoints)

Manually resize or use device emulation at least at:

- [ ] **360px** — mobile: navbar collapses; hero stacks; feature cards stack; no horizontal scroll.
- [ ] **768px** — tablet: two-column grids where intended; trusted-by row wraps cleanly.
- [ ] **1024px+** — desktop: hero two-column layout; features three-column row.
- [ ] Touch targets: primary nav and buttons feel tappable (approx. 44×44px where possible).

## 4. Cross-browser smoke tests

- [ ] **Chrome** (latest): layout, fonts, anchor scrolling.
- [ ] **Firefox** (latest): same; confirm SVG hero and favicon render.
- [ ] **Safari** (latest, macOS/iOS if available): same; verify `prefers-reduced-motion` path by toggling OS setting.

## 5. SEO and metadata

- [ ] `<title>` and meta description match intent and come from JSON-driven content.
- [ ] Canonical URL uses `base_url()` and matches deployment.
- [ ] Open Graph / Twitter meta present; `og:image` resolves (200) for `public/assets/svg/og-default.svg`.
- [ ] Meaningful `alt` on hero image; decorative icons use `aria-hidden` / appropriate patterns.

## 6. Accessibility

- [ ] **Keyboard**: Tab order is logical; skip link is first focusable and visible on focus.
- [ ] **Screen reader** (quick pass with VoiceOver or NVDA): landmarks (`header`, `main`, `footer`); nav `aria-label`; `aria-current="page"` on active nav item.
- [ ] **Contrast**: body text on white; white text on stats band; buttons meet WCAG AA for default state (adjust brand tokens in CSS if audit fails).

## 7. Core Web Vitals and performance (lab)

In Chrome **Lighthouse** (mobile):

- [ ] **LCP**: hero text/image not unreasonably delayed; critical CSS path: Bootstrap + custom CSS; hero image uses `fetchpriority="high"` and explicit dimensions.
- [ ] **CLS**: no major layout shifts on load (reserved space for hero image).
- [ ] **INP** (interaction): nav toggle and buttons respond quickly; no long tasks from scripts (minimal JS).

Also verify:

- [ ] Scripts use `defer` where loaded at end of document; Bootstrap bundle at bottom of `footer` template.
- [ ] `preconnect` to Google Fonts is present.

## 8. Application and data layer

- [ ] `/` resolves to the landing page without PHP errors.
- [ ] Editing `app/Data/content.json` updates visible copy after refresh (no cache surprises in development).
- [ ] JSON parse errors surface as a clear exception in **development** (ContentLoader uses strict JSON decode).

## 9. Security and deployment hygiene

- [ ] `.env` is **not** committed (see `.gitignore`).
- [ ] `app/Data/` is outside `public/` (JSON not directly downloadable).
- [ ] Production: `CI_ENVIRONMENT = production`, debug toolbar off, HTTPS with `app.baseURL` and `app.forceGlobalSecureRequests` as required by hosting.

---

**Sign-off**

| Reviewer | Date | Notes |
| -------- | ---- | ----- |
|          |      |       |
