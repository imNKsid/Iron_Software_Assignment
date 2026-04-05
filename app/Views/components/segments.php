<?php
/** @var list<array{text: string, bold?: bool}> $segments */
foreach (($segments ?? []) as $seg) {
    $text = $seg['text'] ?? '';
    if ($text === '') {
        continue;
    }
    if (! empty($seg['bold'])) {
        echo '<strong class="iron-feature-strong">' . esc($text) . '</strong>';
    } else {
        echo esc($text);
    }
}
