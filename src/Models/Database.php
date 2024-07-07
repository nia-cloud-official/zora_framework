<?php

namespace Src\Models;

class Database {
    public static function getConfig($dbType) {
        $config = require __DIR__ . '/../../config/database.php';
        return $config[$dbType] ?? null;
    }
}
