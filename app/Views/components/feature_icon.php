<?php
/** @var string $name */
$name = $name ?? 'semantic';
echo match ($name) {
    'semantic' => '<svg class="nl-feature-icon" width="40" height="40" viewBox="0 0 40 40" role="img" aria-hidden="true" focusable="false"><rect x="4" y="6" width="32" height="8" rx="2" fill="currentColor" opacity="0.2"/><rect x="4" y="18" width="20" height="6" rx="2" fill="currentColor" opacity="0.35"/><rect x="4" y="28" width="28" height="6" rx="2" fill="currentColor" opacity="0.5"/></svg>',
    'responsive' => '<svg class="nl-feature-icon" width="40" height="40" viewBox="0 0 40 40" role="img" aria-hidden="true" focusable="false"><rect x="6" y="8" width="10" height="24" rx="2" fill="currentColor" opacity="0.35"/><rect x="18" y="10" width="8" height="20" rx="2" fill="currentColor" opacity="0.5"/><rect x="28" y="12" width="6" height="16" rx="2" fill="currentColor" opacity="0.65"/></svg>',
    'performance' => '<svg class="nl-feature-icon" width="40" height="40" viewBox="0 0 40 40" role="img" aria-hidden="true" focusable="false"><path d="M6 30 L20 10 L28 20 L34 14 L34 30 Z" fill="currentColor" opacity="0.25"/><circle cx="20" cy="20" r="3" fill="currentColor"/></svg>',
    default => '<svg class="nl-feature-icon" width="40" height="40" viewBox="0 0 40 40" role="img" aria-hidden="true" focusable="false"><circle cx="20" cy="20" r="12" fill="currentColor" opacity="0.3"/></svg>',
};
