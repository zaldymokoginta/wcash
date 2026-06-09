<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Repositories\UserRepository;

class AuthController extends Controller
{
    private $userRepo;

    public function __construct()
    {
        $this->userRepo = new UserRepository();
    }

    public function login()
    {
        $this->view('auth/login');
    }

    public function register()
    {
        $this->view('auth/register');
    }

    public function store()
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $this->userRepo->findByEmail($email);

        if ($user) {
            die("Email sudah digunakan");
        }

        $this->userRepo->create($name, $email, $password);

        header("Location: /wcash/public/login");
        exit;
    }

    public function authenticate()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $this->userRepo->findByEmail($email);

        if (!$user || !password_verify($password, $user['password'])) {
            die("Login gagal");
        }

        $_SESSION['user'] = [
            'id' => $user['id'],
            'name' => $user['name'],
            'email' => $user['email']
        ];

        header("Location: /wcash/public/dashboard");
        exit;
    }

    public function logout()
    {
        session_destroy();

        header("Location: /wcash/public/login");
        exit;
    }
}