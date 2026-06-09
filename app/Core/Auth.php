<?php

namespace App\Core;

class Auth
{
    public static function check()
    {
        if (!isset($_SESSION['user_id'])) {

            header(
                "Location: /wcash/public/login"
            );

            exit;
        }
    }

    public static function user()
    {
        return $_SESSION['user_id'] ?? null;
    }
}
