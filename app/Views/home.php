<?php
/** @var array<string, mixed> $page */
$hero          = $page['hero'] ?? [];
$signupPrimary = $page['signupPrimary'] ?? [];
$features      = $page['features'] ?? [];
$whyCpp        = $page['whyCpp'] ?? [];
$earlyAccess   = $page['earlyAccess'] ?? [];
$signupFooter  = $page['signupFooter'] ?? [];

$hl     = $hero['heroLogo'] ?? [];
$cppImg = $hero['image'] ?? [];

echo view('templates/header', ['page' => $page]);
?>
<main id="main-content" class="iron-main" tabindex="-1">
    <div class="iron-hero-signup-stack">
    <section class="iron-hero iron-section" id="<?= esc($hero['id'] ?? 'top') ?>" aria-labelledby="hero-heading">
        <div class="container-fluid iron-container px-0">
            <div class="iron-hero-inner iron-hero-inner--with-cpp-art py-4 py-lg-5 text-start">
                <p class="iron-hero-logo-wrap mb-3">
                    <img
                        class="iron-pdf-logo img-fluid"
                        src="<?= esc(base_url(ltrim($hl['src'] ?? 'assets/img/iron_pdf_logo.png', '/'))) ?>"
                        alt="<?= esc($hl['alt'] ?? 'IronPDF for C++') ?>"
                        width="<?= esc((string) ($hl['width'] ?? 360)) ?>"
                        height="<?= esc((string) ($hl['height'] ?? 80)) ?>"
                        loading="eager"
                        decoding="async"
                    >
                </p>
                <p class="iron-tagline"><?= esc($hero['tagline'] ?? '') ?></p>
                <h1 id="hero-heading" class="iron-hero-heading mb-3">
                    <span class="iron-hero-line1 d-block"><?= esc($hero['headingLine1'] ?? '') ?></span>
                    <span class="iron-hero-line2 d-block"><?= esc($hero['headingLine2'] ?? '') ?></span>
                </h1>
                <p class="iron-coming-soon mb-0"><?= esc($hero['status'] ?? '') ?></p>
            </div>
        </div>
    </section>

    <div class="iron-cpp-mobile d-lg-none py-3 text-center" aria-hidden="true">
        <img
            class="img-fluid iron-cpp-img-mobile"
            src="<?= esc(base_url(ltrim($cppImg['src'] ?? 'assets/img/cpp_side_logo.png', '/'))) ?>"
            alt=""
            width="<?= esc((string) ($cppImg['width'] ?? 520)) ?>"
            height="<?= esc((string) ($cppImg['height'] ?? 420)) ?>"
            loading="lazy"
            decoding="async"
        >
    </div>

    <section class="iron-section iron-band iron-band--signup-primary py-5 py-lg-6" id="<?= esc($signupPrimary['id'] ?? 'signup') ?>" aria-labelledby="signup-primary-heading">
        <div class="container-fluid iron-container px-0">
            <div class="iron-band-inner iron-band-inner--with-cpp-art">
                <h2 id="signup-primary-heading" class="iron-band-heading text-white mb-2 text-start"><?= esc($signupPrimary['heading'] ?? '') ?></h2>
                <p class="iron-band-sub text-white mb-4 text-start"><?= esc($signupPrimary['subheading'] ?? '') ?></p>
                <form class="iron-signup-form" action="#" method="post" data-iron-demo-form>
                    <label class="visually-hidden" for="email-primary"><?= esc($signupPrimary['emailPlaceholder'] ?? 'Email') ?></label>
                    <div class="iron-input-combo">
                        <input id="email-primary" name="email" type="email" class="form-control iron-email-input" placeholder="<?= esc($signupPrimary['emailPlaceholder'] ?? '') ?>" autocomplete="email" required>
                        <button type="submit" class="btn iron-btn-pink"><?= esc($signupPrimary['buttonLabel'] ?? '') ?> <span class="iron-btn-chevron" aria-hidden="true"></span></button>
                    </div>
                </form>
                <div class="iron-footnote-row mt-4 d-flex flex-wrap align-items-center gap-3 gap-lg-4">
                    <span class="iron-soon-pill"><span class="iron-soon-hash" aria-hidden="true">#</span> <?= esc($signupPrimary['footnotePill'] ?? '') ?></span>
                    <p class="iron-footnote-line mb-0">
                        <?= esc($signupPrimary['footnoteLead'] ?? '') ?>
                        <?php foreach ($signupPrimary['footnoteLanguages'] ?? [] as $lang) : ?>
                            <span class="iron-footnote-em"><?= esc($lang['label'] ?? '') ?></span><?= esc($lang['suffix'] ?? '') ?>
                        <?php endforeach; ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <figure class="iron-cpp-absolute d-none d-lg-block mb-0" aria-hidden="true">
        <img
            class="iron-cpp-absolute-img"
            src="<?= esc(base_url(ltrim($cppImg['src'] ?? 'assets/img/cpp_side_logo.png', '/'))) ?>"
            alt=""
            width="<?= esc((string) ($cppImg['width'] ?? 520)) ?>"
            height="<?= esc((string) ($cppImg['height'] ?? 420)) ?>"
            loading="eager"
            decoding="async"
            fetchpriority="high"
        >
    </figure>
    </div>

    <section class="iron-section iron-features py-5 py-lg-6" id="<?= esc($features['id'] ?? 'features') ?>" aria-labelledby="features-heading">
        <div class="container-fluid iron-container px-0">
            <div class="text-center mb-4 position-relative">
                <div class="iron-features-title-wrap d-inline-flex align-items-center justify-content-center flex-wrap gap-2 gap-lg-3 position-relative">
                    <h2 id="features-heading" class="iron-features-title text-white mb-0"><?= esc($features['heading'] ?? '') ?></h2>
                    <?php $cs = $features['comingSoonBadge'] ?? []; ?>
                    <?php if ($cs !== []) : ?>
                        <img
                            class="iron-coming-soon-img"
                            src="<?= esc(base_url(ltrim($cs['src'] ?? 'assets/img/coming_soon.png', '/'))) ?>"
                            alt="<?= esc($cs['alt'] ?? 'Coming soon') ?>"
                            width="120"
                            height="120"
                            loading="lazy"
                            decoding="async"
                        >
                    <?php endif; ?>
                </div>
            </div>

            <div class="iron-feat-points d-flex flex-wrap justify-content-center align-items-center gap-2 gap-md-4 mb-5">
                <?php foreach ($features['bullets'] ?? [] as $i => $b) : ?>
                    <?php if (is_array($b)) : ?>
                        <?php if ($i > 0) : ?>
                            <span class="iron-feat-divider" aria-hidden="true">|</span>
                        <?php endif; ?>
                        <div class="iron-feat-item text-center text-md-start">
                            <span class="iron-feat-hash"><?= esc($b['hash'] ?? '#') ?></span><span class="iron-feat-desc"><?= esc($b['text'] ?? '') ?></span>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>

            <div class="iron-feature-body-col">
                <?php foreach ($features['bodyParagraphs'] ?? [] as $para) : ?>
                    <p class="iron-feature-body mb-4">
                        <?= view('components/segments', ['segments' => $para['segments'] ?? []]) ?>
                    </p>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="iron-section iron-why py-5 py-lg-6" id="<?= esc($whyCpp['id'] ?? 'why-cpp') ?>" aria-labelledby="why-heading">
        <div class="container-fluid iron-container px-0">
            <div class="row align-items-center g-5">
                <div class="col-lg-5 text-center text-lg-start">
                    <?php $d = $whyCpp['diagram'] ?? []; ?>
                    <img
                        class="img-fluid iron-why-diagram"
                        src="<?= esc(base_url(ltrim($d['src'] ?? 'assets/img/html_to_pdf.png', '/'))) ?>"
                        alt="<?= esc($d['alt'] ?? '') ?>"
                        loading="lazy"
                        decoding="async"
                    >
                </div>
                <div class="col-lg-7 text-start">
                    <h2 id="why-heading" class="iron-why-title mb-4">
                        <span class="iron-why-line1"><?= esc($whyCpp['headingLine1'] ?? '') ?></span>
                        <span class="iron-why-line2 d-block"><?= esc($whyCpp['headingLine2'] ?? '') ?></span>
                    </h2>
                    <?php foreach ($whyCpp['paragraphs'] ?? [] as $p) : ?>
                        <p class="iron-why-body mb-4 mb-lg-3"><?= esc($p) ?></p>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="iron-section iron-early py-5 py-lg-6" id="<?= esc($earlyAccess['id'] ?? 'early-access') ?>" aria-labelledby="early-heading">
        <div class="container-fluid iron-container px-0">
            <h2 id="early-heading" class="iron-early-title mb-4 text-start">
                <span class="iron-early-line1"><?= esc($earlyAccess['headingLine1'] ?? '') ?></span>
                <span class="iron-early-line2 d-block"><?= esc($earlyAccess['headingLine2'] ?? '') ?></span>
            </h2>
            <p class="iron-early-intro mb-5 text-start"><?= esc($earlyAccess['body'] ?? '') ?></p>
            <div class="row g-4 justify-content-center justify-content-lg-start">
                <?php foreach ($earlyAccess['platforms'] ?? [] as $p) : ?>
                    <div class="col-12 col-lg-4">
                        <div class="iron-early-card">
                            <div class="iron-early-card-top d-flex align-items-center flex-wrap gap-3">
                                <span class="iron-early-pill iron-early-pill--<?= esc($p['tagVariant'] ?? 'soon') ?>"># <?= esc($p['tag'] ?? '') ?></span>
                                <div class="iron-early-product">
                                    <span class="iron-early-iron"><?= esc($p['productIron'] ?? '') ?></span><span class="iron-early-pdf"><?= esc($p['productPdf'] ?? '') ?></span>
                                    <span class="iron-early-sub d-block"><?= esc($p['productSub'] ?? '') ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="iron-section iron-footer-cta py-5 py-lg-6" id="<?= esc($signupFooter['id'] ?? 'beta-signup') ?>" aria-labelledby="footer-cta-heading">
        <div class="container-fluid iron-container px-0 text-center">
            <h2 id="footer-cta-heading" class="iron-footer-cta-title mb-4">
                <span class="iron-footer-line1"><?= esc($signupFooter['headingLine1'] ?? '') ?></span>
                <span class="iron-footer-line2 d-block"><?= esc($signupFooter['headingLine2'] ?? '') ?></span>
            </h2>
            <form class="iron-signup-form iron-signup-form--narrow mx-auto" action="#" method="post" data-iron-demo-form>
                <label class="visually-hidden" for="email-footer"><?= esc($signupFooter['emailPlaceholder'] ?? 'Email') ?></label>
                <div class="iron-input-combo iron-input-combo--footer">
                    <input id="email-footer" name="email" type="email" class="form-control iron-email-input iron-footer-email-input" placeholder="<?= esc($signupFooter['emailPlaceholder'] ?? '') ?>" autocomplete="email" required>
                    <button type="submit" class="btn iron-footer-cta-btn"><?= esc($signupFooter['buttonLabel'] ?? '') ?> <span class="iron-footer-chevron" aria-hidden="true"></span></button>
                </div>
            </form>
        </div>
    </section>
</main>
<?php
echo view('templates/footer', ['page' => $page]);
?>
