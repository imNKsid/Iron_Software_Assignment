<?php
/** @var array<string, mixed> $page */
$hero      = $page['hero'] ?? [];
$trustedBy = $page['trustedBy'] ?? [];
$features  = $page['features'] ?? [];
$stats     = $page['stats'] ?? [];
$cta       = $page['cta'] ?? [];
echo view('templates/header', ['page' => $page]);
?>
<main id="main-content" tabindex="-1">
    <section class="nl-hero py-5 nl-section-y" id="<?= esc($hero['id'] ?? 'product') ?>" aria-labelledby="hero-heading">
        <div class="container nl-container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <p class="nl-eyebrow text-uppercase small fw-semibold text-secondary mb-2"><?= esc($hero['eyebrow'] ?? '') ?></p>
                    <h1 id="hero-heading" class="display-5 fw-bold nl-heading mb-3"><?= esc($hero['heading'] ?? '') ?></h1>
                    <p class="lead text-secondary nl-lead mb-4"><?= esc($hero['subheading'] ?? '') ?></p>
                    <div class="d-flex flex-wrap gap-3">
                        <a class="btn btn-primary btn-lg nl-btn-primary" href="<?= esc($hero['primaryCta']['href'] ?? '#') ?>"><?= esc($hero['primaryCta']['label'] ?? '') ?></a>
                        <a class="btn btn-outline-secondary btn-lg" href="<?= esc($hero['secondaryCta']['href'] ?? '#') ?>"><?= esc($hero['secondaryCta']['label'] ?? '') ?></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <?php $img = $hero['image'] ?? []; ?>
                    <figure class="nl-hero-figure mb-0">
                        <img
                            class="img-fluid rounded-4 shadow nl-hero-img"
                            src="<?= esc(base_url($img['src'] ?? '/assets/img/hero-panel.svg')) ?>"
                            alt="<?= esc($img['alt'] ?? '') ?>"
                            width="<?= esc((string) ($img['width'] ?? 560)) ?>"
                            height="<?= esc((string) ($img['height'] ?? 420)) ?>"
                            loading="eager"
                            decoding="async"
                            fetchpriority="high"
                        >
                    </figure>
                </div>
            </div>
        </div>
    </section>

    <section class="nl-trusted py-5 bg-light border-top border-bottom" id="<?= esc($trustedBy['id'] ?? 'solutions') ?>" aria-labelledby="trusted-heading">
        <div class="container nl-container">
            <h2 id="trusted-heading" class="h6 text-uppercase text-secondary fw-semibold text-center mb-4"><?= esc($trustedBy['heading'] ?? '') ?></h2>
            <div class="row row-cols-2 row-cols-md-4 g-3 justify-content-center text-center">
                <?php foreach ($trustedBy['logos'] ?? [] as $logo) : ?>
                    <div class="col">
                        <div class="nl-logo-tile border rounded-3 py-3 px-2 bg-white">
                            <span class="visually-hidden"><?= esc($logo['name'] ?? '') ?></span>
                            <span class="fw-semibold nl-logo-abbr" aria-hidden="true"><?= esc($logo['abbr'] ?? '') ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="nl-features py-5 nl-section-y" id="<?= esc($features['id'] ?? 'features') ?>" aria-labelledby="features-heading">
        <div class="container nl-container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-lg-8">
                    <h2 id="features-heading" class="fw-bold nl-section-title mb-3"><?= esc($features['heading'] ?? '') ?></h2>
                    <p class="text-secondary nl-section-lead mb-0"><?= esc($features['subheading'] ?? '') ?></p>
                </div>
            </div>
            <div class="row g-4">
                <?php foreach ($features['items'] ?? [] as $item) : ?>
                    <div class="col-md-4">
                        <article class="card h-100 nl-card border-0 shadow-sm" aria-labelledby="<?= esc($item['id'] ?? '') ?>-title">
                            <div class="card-body p-4">
                                <div class="text-primary mb-3" aria-hidden="true">
                                    <?= view('components/feature_icon', ['name' => $item['icon'] ?? 'semantic']) ?>
                                </div>
                                <h3 id="<?= esc($item['id'] ?? '') ?>-title" class="h5 card-title"><?= esc($item['title'] ?? '') ?></h3>
                                <p class="card-text text-secondary mb-0"><?= esc($item['body'] ?? '') ?></p>
                            </div>
                        </article>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="nl-stats py-5 text-white nl-stats-section" id="<?= esc($stats['id'] ?? 'pricing') ?>" aria-labelledby="stats-heading">
        <div class="container nl-container">
            <h2 id="stats-heading" class="h6 text-uppercase fw-semibold opacity-75 mb-4"><?= esc($stats['heading'] ?? '') ?></h2>
            <div class="row g-4">
                <?php foreach ($stats['items'] ?? [] as $row) : ?>
                    <div class="col-md-4">
                        <p class="display-6 fw-bold mb-1"><?= esc($row['value'] ?? '') ?></p>
                        <p class="mb-0 opacity-90"><?= esc($row['label'] ?? '') ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="nl-cta py-5 nl-section-y" id="<?= esc($cta['id'] ?? 'cta') ?>" aria-labelledby="cta-heading">
        <div class="container nl-container">
            <div class="nl-cta-panel rounded-4 p-4 p-lg-5 text-center text-lg-start">
                <div class="row align-items-center g-4">
                    <div class="col-lg-8">
                        <h2 id="cta-heading" class="fw-bold mb-2"><?= esc($cta['heading'] ?? '') ?></h2>
                        <p class="text-secondary mb-0 nl-cta-copy"><?= esc($cta['body'] ?? '') ?></p>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a class="btn btn-primary btn-lg nl-btn-primary" href="<?= esc($cta['button']['href'] ?? '#') ?>"><?= esc($cta['button']['label'] ?? '') ?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php
echo view('templates/footer', ['page' => $page]);
?>
