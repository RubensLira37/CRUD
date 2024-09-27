<?php
require_once "Adm.php";

class Products implements Adm{
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function select_id(string $id): mixed {
        $query = "SELECT * FROM products WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id) ;
        $stmt->execute();
        return $stmt->get_result();
    } 
    public function select_name(string $name): mixed {
        $query = "SELECT * FROM products WHERE name = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $name) ;
        $stmt->execute();
        return $stmt->get_result();
    } 
    
    public function select_table(): mixed {
        $query = "SELECT * FROM products ORDER BY name";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function insert_into(
        string $name, 
        string $brand, 
        string $category, 
        string $price, 
        string $created_by
    ): bool {
        $result = $this->select_name($name);
        if ($result->num_rows == 0) {
            $query = "INSERT INTO products (name, brand, category, price, created_by) VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("sssds", $name, $brand, $category, $price, $created_by);
            $stmt->execute();
            return true;
        }
        return false;
    }

    public function update(
        int $id,
        string $name, 
        string $brand, 
        string $category, 
        string $price, 
        string $created_by
    ): bool {
        $query = "UPDATE products SET name = ?, brand = ?, category = ?, price = ?, created_by = ? WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("sssdsi", $name, $brand, $category, $price, $created_by, $id);
        $stmt->execute();
        return true;
    }

    public function delete(int $id): bool {
        $result = $this->select_id($id);
        if ($result->num_rows > 0) {
            $query = 'DELETE FROM products WHERE id = ?';
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('i', $id);
            $stmt->execute();
            return true;
        }
        return false;
    }
}