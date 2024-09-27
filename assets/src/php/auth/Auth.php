<?php
require_once "Authentication.php";
class Auth implements Authentication {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function check(string $email): mixed {
        $query = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        return $stmt->get_result();
    }
    
    public function login(string $email, string $password): bool {
        $result = $this->check($email);
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user["password"])) {    
                $_SESSION["id"] = $user["id"];
                $_SESSION["email"] = $user["email"];
                return true;
            }
        }
        return false;
    }

    public function signup(string $email, string $password): bool {
        $result = $this->check($email);

        if ($result->num_rows == 0) {
            $query = "INSERT INTO users (email, password) VALUES (?, ?)";
            $stmt = $this->db->prepare($query);
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $stmt->bind_param("ss", $email, $hashedPassword);
            $stmt->execute();
            return true;
        } 
        return false;
    }
}