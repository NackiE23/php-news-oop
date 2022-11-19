<?php

namespace App\Controllers;

class Auth {
    public static function register($data) {
        $_SESSION['message'] = ['category' => 'success', 'text' => $data['fname']];
    }

    public static function login($data) {
        $_SESSION['message'] = ['category' => 'success', 'text' => $data['fname']];
    }

    public static function logout() {
        unset($_SESSION['user']);
        $_SESSION['message'] = ['category' => 'success', 'text' => 'You have been successfuly logged out!'];
    }
}