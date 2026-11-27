<?php
declare(strict_types=1);

spl_autoload_register(function (string $class): void {
    $prefix = 'TechOS\\';
    if (strncmp($prefix, $class, strlen($prefix)) !== 0) {
        return;
    }

    $relativeClass = substr($class, strlen($prefix));
    $parts = explode('\\', $relativeClass);
    $fileName = array_pop($parts) . '.php';
    $dirPath = strtolower(implode(DIRECTORY_SEPARATOR, $parts));

    $file = __DIR__ . DIRECTORY_SEPARATOR . ($dirPath ? $dirPath . DIRECTORY_SEPARATOR : '') . $fileName;
    if (file_exists($file)) {
        require_once $file;
    }
});
