<?php
/** @var array<string, mixed> $page */
$meta = $page['meta'] ?? [];
$site = $page['site'] ?? [];
$nav  = $page['navigation'] ?? [];
$logoSrc = $site['logoSrc'] ?? '/assets/img/logo.png';
$logoAlt = $site['logoAlt'] ?? 'Iron Software';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($meta['title'] ?? ($site['name'] ?? 'Page')) ?></title>
    <meta name="description" content="<?= esc($meta['description'] ?? '') ?>">
    <meta name="theme-color" content="<?= esc($meta['themeColor'] ?? '#2C0F29') ?>">
    <link rel="canonical" href="<?= esc(base_url($meta['canonicalPath'] ?? '/')) ?>">
    <meta property="og:title" content="<?= esc($meta['title'] ?? '') ?>">
    <meta property="og:description" content="<?= esc($meta['description'] ?? '') ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= esc(base_url($meta['canonicalPath'] ?? '/')) ?>">
    <meta property="og:image" content="<?= esc(base_url($meta['ogImage'] ?? '/assets/svg/og-ironpdf.svg')) ?>">
    <meta name="twitter:card" content="summary_large_image">
    <link rel="icon" href="<?= base_url('favicon.svg') ?>" type="image/svg+xml">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" as="style" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700;900&display=swap" rel="stylesheet" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('assets/css/base.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/components.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/theme.css') ?>">
</head>
<body class="iron-body">
<a class="visually-hidden-focusable iron-skip-link position-absolute start-0 top-0 px-3 py-2" href="#main-content">Skip to main content</a>
<header class="iron-header sticky-top">
    <nav class="navbar navbar-expand-lg navbar-dark iron-nav align-items-center" aria-label="<?= esc($nav['label'] ?? 'Primary') ?>">
        <div class="container-fluid iron-container iron-nav-bar px-0">
            <a class="navbar-brand iron-brand iron-brand-logo p-0 me-0" href="<?= base_url('/') ?>">
                <img src="<?= esc(base_url(ltrim($logoSrc, '/'))) ?>" class="iron-site-logo" alt="<?= esc($logoAlt) ?>" loading="eager" decoding="async">
            </a>
            <button class="navbar-toggler iron-nav-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#<?= esc($nav['id'] ?? 'primary-navigation') ?>" aria-controls="<?= esc($nav['id'] ?? 'primary-navigation') ?>" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse iron-nav-collapse" id="<?= esc($nav['id'] ?? 'primary-navigation') ?>">
                <ul class="navbar-nav iron-nav-list align-items-lg-center">
                    <?php foreach ($nav['items'] ?? [] as $item) : ?>
                        <?php $children = $item['children'] ?? null; ?>
                        <?php if (is_array($children) && $children !== []) : ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle iron-nav-link" href="#" id="dropdown-<?= esc($item['id'] ?? 'dd') ?>" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?= esc($item['label'] ?? '') ?></a>
                                <ul class="dropdown-menu dropdown-menu-dark iron-dropdown" aria-labelledby="dropdown-<?= esc($item['id'] ?? 'dd') ?>">
                                    <?php foreach ($children as $child) : ?>
                                        <?php
                                        $chref = $child['href'] ?? '#';
                                        $ext   = is_string($chref) && str_starts_with($chref, 'http');
                                        ?>
                                        <li>
                                            <a class="dropdown-item" href="<?= esc($chref) ?>"<?= $ext ? ' target="_blank" rel="noopener noreferrer"' : '' ?>><?= esc($child['label'] ?? '') ?></a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                        <?php else : ?>
                            <li class="nav-item">
                                <a class="nav-link iron-nav-link" href="<?= esc($item['href'] ?? '#') ?>"><?= esc($item['label'] ?? '') ?></a>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </nav>
</header>
