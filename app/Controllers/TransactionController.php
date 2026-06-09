<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Repositories\CategoryRepository;
use App\Repositories\TransactionRepository;

class TransactionController extends Controller
{
    private $transactionRepo;
    private $categoryRepo;

    public function __construct()
    {
        $this->transactionRepo = new TransactionRepository();
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

        $transactions =
            $this->transactionRepo->getAllByUser(
                $_SESSION['user']['id']
            );

        $this->view('transactions/index', [
            'transactions' => $transactions
        ]);
    }

    public function create()
    {
        $this->checkAuth();

        $categories =
            $this->categoryRepo->getForDropdown(
                $_SESSION['user']['id']
            );

        $this->view('transactions/create', [
            'categories' => $categories
        ]);
    }

    public function store()
    {
        $this->checkAuth();

        $this->transactionRepo->create(
            $_SESSION['user']['id'],
            $_POST['category_id'],
            $_POST['type'],
            $_POST['amount'],
            $_POST['description'],
            $_POST['transaction_date']
        );

        $_SESSION['success'] =
        "Transaction saved successfully";

        header("Location: /wcash/public/transactions");
        exit;
    }
}