<?php
/** @var array<string, mixed> $page */
$footer = $page['footer'] ?? [];
?>
<footer class="iron-footer py-4 mt-auto" role="contentinfo">
    <div class="container-fluid iron-container px-0 text-center">
        <p class="iron-footer-copy small mb-0"><?= esc($footer['finePrint'] ?? '') ?></p>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>
<script src="<?= base_url('assets/js/app.js') ?>" defer></script>
</body>
</html>
