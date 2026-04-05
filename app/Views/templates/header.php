<?php
/** @var array<string, mixed> $page */
$meta = $page['meta'] ?? [];
$site = $page['site'] ?? [];
$nav  = $page['navigation'] ?? [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($meta['title'] ?? ($site['name'] ?? 'Page')) ?></title>
    <meta name="description" content="<?= esc($meta['description'] ?? '') ?>">
    <meta name="theme-color" content="<?= esc($meta['themeColor'] ?? '#1e3a5f') ?>">
    <link rel="canonical" href="<?= esc(base_url($meta['canonicalPath'] ?? '/')) ?>">
    <meta property="og:title" content="<?= esc($meta['title'] ?? '') ?>">
    <meta property="og:description" content="<?= esc($meta['description'] ?? '') ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= esc(base_url($meta['canonicalPath'] ?? '/')) ?>">
    <meta property="og:image" content="<?= esc(base_url($meta['ogImage'] ?? '/assets/img/og-default.svg')) ?>">
    <meta name="twitter:card" content="summary_large_image">
    <link rel="icon" href="<?= base_url('favicon.svg') ?>" type="image/svg+xml">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" as="style" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('assets/css/base.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/components.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/theme.css') ?>">
</head>
<body class="nl-body">
<a class="visually-hidden-focusable skip-link nl-skip-link rounded-bottom px-3 py-2 position-absolute start-0 top-0" href="#main-content">Skip to main content</a>
<header class="nl-header border-bottom bg-white sticky-top shadow-sm">
    <nav class="navbar navbar-expand-lg nl-navbar" aria-label="<?= esc($nav['label'] ?? 'Primary') ?>">
        <div class="container nl-container">
            <a class="navbar-brand fw-semibold nl-brand" href="<?= base_url('/') ?>"><?= esc($site['logoLabel'] ?? $site['name'] ?? '') ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#<?= esc($nav['id'] ?? 'primary-navigation') ?>" aria-controls="<?= esc($nav['id'] ?? 'primary-navigation') ?>" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="<?= esc($nav['id'] ?? 'primary-navigation') ?>">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 gap-lg-1">
                    <?php foreach ($nav['items'] ?? [] as $item) : ?>
                        <li class="nav-item">
                            <a
                                class="nav-link nl-nav-link<?= ! empty($item['isActive']) ? ' active' : '' ?>"
                                href="<?= esc($item['href'] ?? '#') ?>"
                                <?php if (! empty($item['isActive'])) : ?>aria-current="page"<?php endif; ?>
                            ><?= esc($item['label'] ?? '') ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <?php $cta = $nav['cta'] ?? null; ?>
                <?php if ($cta !== null) : ?>
                    <div class="ms-lg-3 mt-3 mt-lg-0">
                        <a class="btn btn-primary nl-btn-primary" href="<?= esc($cta['href'] ?? '#') ?>"><?= esc($cta['label'] ?? '') ?></a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </nav>
</header>
