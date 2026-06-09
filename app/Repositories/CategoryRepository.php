<?php

namespace App\Repositories;

use PDO;

class CategoryRepository extends BaseRepository
{
    public function getAllByUser($userId)
    {
        $sql = "SELECT * FROM categories
                WHERE user_id = :user_id
                ORDER BY name ASC";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            'user_id' => $userId
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        $sql = "SELECT * FROM categories WHERE id = :id";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            'id' => $id
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($userId, $name)
    {
        $sql = "INSERT INTO categories (user_id, name)
                VALUES (:user_id, :name)";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            'user_id' => $userId,
            'name' => $name
        ]);
    }

    public function update($id, $name)
    {
        $sql = "UPDATE categories
                SET name = :name
                WHERE id = :id";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            'id' => $id,
            'name' => $name
        ]);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM categories
                WHERE id = :id";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            'id' => $id
        ]);
    }

    public function getForDropdown($userId)
    {
        $sql = "
        SELECT id, name
        FROM categories
        WHERE user_id = :user_id
        ORDER BY name ASC
    ";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            'user_id' => $userId
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
