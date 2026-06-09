<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Repositories\TransactionRepository;

class DashboardController extends Controller
{
    public function index()
    {
        if (!isset($_SESSION['user'])) {
            header("Location: /wcash/public/login");
            exit;
        }

        $user = $_SESSION['user'];
        $latestTransactions = $this->transactionRepo->getLatestTransactions($user['id']);

        $expenseByCategory =
            $this->transactionRepo
            ->getExpenseByCategory($user['id']);

        $summary =
            $this->transactionRepo
            ->getIncomeExpenseSummary($user['id']);

        $incomeByCategory =
            $this->transactionRepo->getIncomeByCategory($user['id']);

        $expenseByCategory =
            $this->transactionRepo->getExpenseByCategory($user['id']);

        $daily = $this->transactionRepo->getDailyIncomeExpense($user['id']);

        foreach ($daily as &$d) {
            $d['date'] = date('d M', strtotime($d['date']));
        }


        $income =
            $this->transactionRepo
            ->getTotalIncome($user['id']);

        $expense =
            $this->transactionRepo
            ->getTotalExpense($user['id']);

        $balance = $income - $expense;

        $this->view('dashboard/index', [
            'user' => $user,
            'income' => $income,
            'expense' => $expense,
            'balance' => $balance,
            'latestTransactions' => $latestTransactions,
            'incomeByCategory' => $incomeByCategory,
            'expenseByCategory' => $expenseByCategory,
            'daily' => $daily
        ]);
    }

    private $transactionRepo;

    public function __construct()
    {
        $this->transactionRepo =
            new TransactionRepository();
    }
}
