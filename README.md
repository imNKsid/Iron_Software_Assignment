# Iron Software — Front-end test task (CodeIgniter 4)

This repository implements the take-home brief: a **Bootstrap 5** landing page driven by **JSON** content, served through **CodeIgniter 4** with clear separation between controller, views, and assets. The original design reference is in Figma:

[https://www.figma.com/file/rnqGoCJqAd7lPrPgYwkEmT/Test-Design?node-id=0%3A1](https://www.figma.com/file/rnqGoCJqAd7lPrPgYwkEmT/Test-Design?node-id=0%3A1)

Because the Figma file is not embedded here, **colors, spacing, and typography should be reconciled against that file** (Inspect panel). Design tokens live mainly in `public/assets/css/base.css` (`:root` variables) and Bootstrap overrides in `public/assets/css/theme.css`.

## Tech stack

- **PHP 8.1+** / **CodeIgniter 4.7** (from the official app starter)
- **HTML5** semantic landmarks (`header`, `main`, `section`, `footer`, heading order)
- **Bootstrap 5.3.3** (CDN) plus modular custom CSS (`base`, `components`, `theme`)
- **Inter** (Google Fonts, `display=swap`) with `preconnect`
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

## Figma alignment

After exporting assets from Figma (or matching hex values and spacing):

1. Update `:root` variables in `public/assets/css/base.css` and `theme.css`.
2. Replace or adjust images under `public/assets/img/` if the design specifies raster artwork.
3. Adjust copy and section order in `app/Data/content.json` as needed.

## License

The CodeIgniter framework retains its original **MIT** license (`LICENSE`). Assignment-specific front-end code is provided for evaluation purposes.
