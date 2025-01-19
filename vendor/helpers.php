<?php

if (!function_exists('view')) {
    function view(string $view, array $params = []): string
    {
        // Базовая директория для вьюх
        $baseDir = __DIR__ . '/app/Presentation/Views/';
        $filePath = $baseDir . str_replace('.', '/', $view) . '.php';
        if (!file_exists($filePath)) {
            throw new \RuntimeException("Вьюха {$filePath} не найдена.");
        }
        extract($params);

        ob_start();
        include $filePath;
        return ob_get_clean();
    }
}