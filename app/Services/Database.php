<?php

namespace App\Services;

class Database extends \SQLite3 {
    function __construct($file) {
        $this->open($file);
    }
}
