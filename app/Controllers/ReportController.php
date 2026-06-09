<?php

namespace App\Controllers;

use App\Repositories\TransactionRepository;
use Dompdf\Dompdf;

class ReportController
{
    private $repo;

    public function __construct()
    {
        $this->repo = new TransactionRepository();
    }

    public function exportPdf()
    {
        if (!isset($_SESSION['user'])) {
            die("Please login first");
        }

        $userId = $_SESSION['user']['id'];

        $transactions =
            $this->repo->getAllByUser($userId);

        $income =
            $this->repo->getTotalIncome($userId);

        $expense =
            $this->repo->getTotalExpense($userId);

        $balance = $income - $expense;

        $html = $this->generateHtml(
            $transactions,
            $income,
            $expense,
            $balance
        );

        $dompdf = new Dompdf();

        $dompdf->loadHtml($html);

        $dompdf->setPaper(
            'A4',
            'portrait'
        );

        $dompdf->render();

        $dompdf->stream(
            'WCash_Report.pdf',
            [
                'Attachment' => true
            ]
        );
    }

    private function generateHtml(
        $transactions,
        $income,
        $expense,
        $balance
    ) {
        $html = "
        <html>

        <head>

            <style>

                body{
                    font-family: Arial;
                    font-size:12px;
                }

                h1{
                    text-align:center;
                }

                table{
                    width:100%;
                    border-collapse:collapse;
                    margin-top:20px;
                }

                table,
                th,
                td{
                    border:1px solid #000;
                }

                th,
                td{
                    padding:8px;
                }

                .summary{
                    margin-top:20px;
                }

            </style>

        </head>

        <body>

            <h1>WCash Financial Report</h1>

            <div class='summary'>

                <p><strong>Total Income:</strong>
                Rp " . number_format($income) . "</p>

                <p><strong>Total Expense:</strong>
                Rp " . number_format($expense) . "</p>

                <p><strong>Balance:</strong>
                Rp " . number_format($balance) . "</p>

            </div>

            <table>

                <tr>
                    <th>Date</th>
                    <th>Category</th>
                    <th>Type</th>
                    <th>Amount</th>
                    <th>Description</th>
                </tr>
        ";

        foreach ($transactions as $trx) {
            $html .= "

            <tr>

                <td>{$trx['transaction_date']}</td>

                <td>{$trx['category_name']}</td>

                <td>{$trx['type']}</td>

                <td>
                    Rp " . number_format($trx['amount']) . "
                </td>

                <td>{$trx['description']}</td>

            </tr>

            ";
        }

        $html .= "

            </table>

        </body>

        </html>

        ";

        return $html;
    }
}
