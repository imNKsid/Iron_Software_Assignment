<?php
/** @var array<string, mixed> $page */
$footer = $page['footer'] ?? [];
?>
<footer class="nl-footer border-top mt-auto pt-5 pb-4 bg-light" id="<?= esc($footer['id'] ?? 'footer') ?>" aria-labelledby="footer-site-title">
    <div class="container nl-container">
        <div class="row g-4">
            <div class="col-lg-4">
                <p id="footer-site-title" class="fw-semibold mb-2"><?= esc($page['site']['name'] ?? '') ?></p>
                <p class="text-secondary small mb-0"><?= esc($footer['tagline'] ?? '') ?></p>
            </div>
            <?php foreach ($footer['columns'] ?? [] as $col) : ?>
                <div class="col-6 col-lg-2">
                    <h2 class="h6 text-uppercase text-secondary fw-semibold nl-letter-spacing"><?= esc($col['title'] ?? '') ?></h2>
                    <ul class="list-unstyled small mb-0">
                        <?php foreach ($col['links'] ?? [] as $link) : ?>
                            <li class="mb-2">
                                <a class="link-secondary nl-footer-link" href="<?= esc($link['href'] ?? '#') ?>"><?= esc($link['label'] ?? '') ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endforeach; ?>
        </div>
        <p class="text-secondary small mt-4 mb-0"><?= esc($footer['finePrint'] ?? '') ?></p>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>
<script src="<?= base_url('assets/js/app.js') ?>" defer></script>
</body>
</html>
