# Iron Software — Front-end test task (CodeIgniter 4)

This repository implements the take-home brief: a **Bootstrap 5** landing page for **IronPDF for C++** (Iron Software beta program), driven by **JSON** content and served through **CodeIgniter 4**. The layout, dark theme, pink CTAs, and section order follow the **Test Design** Figma file:

[https://www.figma.com/design/rnqGoCJqAd7lPrPgYwkEmT/Test-Design](https://www.figma.com/design/rnqGoCJqAd7lPrPgYwkEmT/Test-Design)

Design tokens live in `public/assets/css/base.css` (`:root`) and section styling in `public/assets/css/components.css`. The page background matches Figma at **`#2C0F29`**.

**Raster / SVG assets** (place under `public/assets/img/`):

- `logo.png` — header Iron Software logo  
- `iron_pdf_logo.png` — hero product logo (“IronPDF for C++”)  
- `cpp_side_logo.png` — right-hand hero artwork (tall column aligned with hero)  
- `coming_soon.png` — sticker badge next to “IronPDF for C++” features title  
- `html_to_pdf.png` — “Why make a C++ PDF Library” diagram  
- `iron_pdf_java.svg`, `iron_pdf_python.svg`, `iron_pdf_node.svg` — early-access cards (placeholders included; replace with final art if needed)  

CSS uses **`font-family: "Gotham", "Montserrat", …`**. Gotham is not bundled; **Montserrat** loads from Google Fonts as a close fallback. Install Gotham locally or provide `@font-face` if you need an exact match.

## Tech stack

- **PHP 8.1+** / **CodeIgniter 4.7** (from the official app starter)
- **HTML5** semantic landmarks (`header`, `main`, `section`, `footer`, heading order)
- **Bootstrap 5.3.3** (CDN) plus modular custom CSS (`base`, `components`, `theme`)
- **Montserrat** (Google Fonts, weights 300 / 500 / 700 / 900, `display=swap`) with `preconnect`
- **Vanilla JS** (`public/assets/js/app.js`) for accessible in-page anchor scrolling (respects `prefers-reduced-motion`)
- **JSON** content: `app/Data/content.json` (not web-exposed), loaded by `App\Libraries\ContentLoader`

## Project layout (high level)

| Area | Purpose |
|------|---------|
| `app/Controllers/Home.php` | Loads JSON and returns the main view |
| `app/Libraries/ContentLoader.php` | Reads and validates JSON |
| `app/Data/content.json` | Simulated CMS / dynamic copy & structure |
| `app/Views/` | `home.php` plus `templates/` and `components/` partials |
| `public/` | Web root (`index.php`, `assets/`, `favicon.svg`) |

Routing is declared in `app/Config/Routes.php`:

- `GET /` → `Home::index`
- `GET /landing` → same controller (extra route to show basic routing)

## Setup

1. **PHP** 8.1 or newer and **Composer** 2.x.
2. Clone the repository and install PHP dependencies:

   ```bash
   composer install
   ```

3. Environment file:

   ```bash
   cp env .env
   ```

   Edit `.env` and set **`app.baseURL`** to match how you serve the app, for example:

   ```ini
   CI_ENVIRONMENT = development
   app.baseURL = 'http://localhost:8080/'
   ```

4. **Run** the built-in server (from the project root):

   ```bash
   php spark serve
   ```

   Open the URL it prints (default `http://localhost:8080`). The document root for production deployments should be the **`public/`** directory.

5. **Quality checks**: run Lighthouse in Chrome DevTools against the home page; see `docs/QA_CHECKLIST.md` for a manual pass aligned with the assignment.

## License

The CodeIgniter framework retains its original **MIT** license (`LICENSE`). Assignment-specific front-end code is provided for evaluation purposes.
