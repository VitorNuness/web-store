<?php

declare(strict_types=1);

if (!function_exists('base_path')) {
    function base_path(string $path = ''): string
    {
        return dirname(__DIR__) . '/' . $path;
    }
}

if (!function_exists('mix')) {
    function mix(string $path): string
    {
        if (!file_exists(base_path('public/mix-manifest.json'))) {
            throw new RuntimeException('The mix-manifest.json not exist.');
        }

        $content = file_get_contents(__DIR__ . '/../public/mix-manifest.json');
        $content = json_decode($content, true);

        return $content[$path] ?? '';
    }
}
