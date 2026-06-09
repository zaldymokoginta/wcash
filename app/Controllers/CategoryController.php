<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Repositories\CategoryRepository;

class CategoryController extends Controller
{
    private $categoryRepo;

    public function __construct()
    {
        $this->categoryRepo = new CategoryRepository();
    }

    private function checkAuth()
    {
        if (!isset($_SESSION['user'])) {
            header("Location: /wcash/public/login");
            exit;
        }
    }

    public function index()
    {
        $this->checkAuth();

        $categories = $this->categoryRepo
            ->getAllByUser($_SESSION['user']['id']);

        $this->view('categories/index', [
            'categories' => $categories
        ]);
    }

    public function create()
    {
        $this->checkAuth();

        $this->view('categories/create');
    }

    public function store()
    {
        $this->checkAuth();

        $name = trim($_POST['name']);

        $this->categoryRepo->create(
            $_SESSION['user']['id'],
            $name
        );

        header("Location: /wcash/public/categories");
        exit;
    }

    public function edit()
    {
        $this->checkAuth();

        $id = $_GET['id'];

        $category = $this->categoryRepo->find($id);

        $this->view('categories/edit', [
            'category' => $category
        ]);
    }

    public function update()
    {
        $this->checkAuth();

        $id = $_POST['id'];
        $name = $_POST['name'];

        $this->categoryRepo->update($id, $name);

        header("Location: /wcash/public/categories");
        exit;
    }

    public function delete()
    {
        $this->checkAuth();

        $id = $_GET['id'];

        $this->categoryRepo->delete($id);

        header("Location: /wcash/public/categories");
        exit;
    }
}