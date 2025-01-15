<?php

spl_autoload_register(function ($class) {

    $classPath = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
    $filePath = $classPath;
    if (file_exists($filePath)) {
        require_once $filePath;
    } else {
        throw new Exception("Не удалось загрузить класс: $class");
    }
});