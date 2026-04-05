<?php

declare(strict_types=1);

namespace App\Libraries;

use JsonException;
use RuntimeException;

/**
 * Loads structured page content from the JSON data source.
 */
class ContentLoader
{
    private string $path;

    public function __construct(?string $path = null)
    {
        $this->path = $path ?? APPPATH . 'Data/content.json';
    }

    /**
     * @return array<string, mixed>
     */
    public function load(): array
    {
        if (! is_file($this->path)) {
            throw new RuntimeException('Content file not found: ' . $this->path);
        }

        $raw = file_get_contents($this->path);

        if ($raw === false) {
            throw new RuntimeException('Unable to read content file.');
        }

        try {
            /** @var array<string, mixed> $data */
            $data = json_decode($raw, true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            throw new RuntimeException('Invalid JSON in content file.', 0, $e);
        }

        return $data;
    }
}
