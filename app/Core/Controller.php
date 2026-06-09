<?php

namespace App\Core;

class Controller
{
    protected function view($view, $data = [])
    {
        extract($data);

        require __DIR__ . '/../Views/' . $view . '.php';
    }

    protected function redirect($path)
    {
        header("Location: {$path}");
        exit;
    }
}
