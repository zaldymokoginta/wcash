<?php

namespace App\Repositories;

use PDO;

class TransactionRepository extends BaseRepository
{
    public function getAllByUser($userId)
    {
        $sql = "
            SELECT
                t.*,
                c.name AS category_name
            FROM transactions t
            JOIN categories c
                ON t.category_id = c.id
            WHERE t.user_id = :user_id
            ORDER BY t.transaction_date DESC
        ";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            'user_id' => $userId
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        $sql = "SELECT * FROM transactions WHERE id = :id";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            'id' => $id
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create(
        $userId,
        $categoryId,
        $type,
        $amount,
        $description,
        $transactionDate
    ) {
        $sql = "
            INSERT INTO transactions
            (
                user_id,
                category_id,
                type,
                amount,
                description,
                transaction_date
            )
            VALUES
            (
                :user_id,
                :category_id,
                :type,
                :amount,
                :description,
                :transaction_date
            )
        ";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            'user_id' => $userId,
            'category_id' => $categoryId,
            'type' => $type,
            'amount' => $amount,
            'description' => $description,
            'transaction_date' => $transactionDate
        ]);
    }

    public function update(
        $id,
        $categoryId,
        $type,
        $amount,
        $description,
        $transactionDate
    ) {
        $sql = "
            UPDATE transactions
            SET
                category_id = :category_id,
                type = :type,
                amount = :amount,
                description = :description,
                transaction_date = :transaction_date
            WHERE id = :id
        ";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            'id' => $id,
            'category_id' => $categoryId,
            'type' => $type,
            'amount' => $amount,
            'description' => $description,
            'transaction_date' => $transactionDate
        ]);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM transactions WHERE id = :id";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            'id' => $id
        ]);
    }

    public function getTotalIncome($userId)
    {
        $sql = "
        SELECT COALESCE(SUM(amount),0) AS total
        FROM transactions
        WHERE user_id = :user_id
        AND type = 'income'
    ";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            'user_id' => $userId
        ]);

        return $stmt->fetch()['total'];
    }

    public function getTotalExpense($userId)
    {
        $sql = "
        SELECT COALESCE(SUM(amount),0) AS total
        FROM transactions
        WHERE user_id = :user_id
        AND type = 'expense'
    ";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            'user_id' => $userId
        ]);

        return $stmt->fetch()['total'];
    }
    public function getLatestTransactions($userId, $limit = 5)
    {
        $sql = "
        SELECT
            t.*,
            c.name AS category_name
        FROM transactions t
        JOIN categories c ON t.category_id = c.id
        WHERE t.user_id = :user_id
        ORDER BY t.transaction_date DESC, t.id DESC
        LIMIT $limit
    ";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            'user_id' => $userId
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getExpenseByCategory($userId)
    {
        $sql = "
        SELECT
            c.name AS category,
            SUM(t.amount) AS total
        FROM transactions t
        JOIN categories c ON t.category_id = c.id
        WHERE t.user_id = :user_id
        AND t.type = 'expense'
        GROUP BY t.category_id
        ORDER BY total DESC
    ";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            'user_id' => $userId
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getIncomeExpenseSummary($userId)
    {
        $sql = "
        SELECT type, SUM(amount) AS total
        FROM transactions
        WHERE user_id = :user_id
        GROUP BY type
    ";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            'user_id' => $userId
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getIncomeByCategory($userId)
    {
        $sql = "
        SELECT c.name AS category, SUM(t.amount) AS total
        FROM transactions t
        JOIN categories c ON t.category_id = c.id
        WHERE t.user_id = :user_id
        AND t.type = 'income'
        GROUP BY t.category_id
    ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute(['user_id' => $userId]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDailyIncomeExpense($userId)
    {
        $stmt = $this->db->prepare("
        SELECT 
            DATE(transaction_date) as date,
            SUM(CASE WHEN type = 'income' THEN amount ELSE 0 END) as income,
            SUM(CASE WHEN type = 'expense' THEN amount ELSE 0 END) as expense
        FROM transactions
        WHERE user_id = ?
        GROUP BY DATE(transaction_date)
        ORDER BY date ASC
    ");

        $stmt->execute([$userId]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
