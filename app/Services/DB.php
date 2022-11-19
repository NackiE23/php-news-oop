<?php

namespace App\Services;

class DB extends \SQLite3 {
    function __construct($file) {
        $this->open($file);
    }
}
