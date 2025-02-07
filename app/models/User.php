<?php
class User {
    private $db;

    public function __construct(Db $db) {
        $this->db = $db->getConnection();
    }

    private function findUserByEmail(string $email): ?array {
        try {
            $stmt = $this->db->prepare("SELECT * FROM users WHERE user_email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result ? $result : null;
        } catch (PDOException $e) {

            return null;
        }
    }
    
    private function emailExists(string $email): bool {
        $user = $this->findUserByEmail($email);
        return $user !== null;
    }

    private function insertUser(array $data): bool {
        $stmt = $this->db->prepare("
            INSERT INTO users (user_firstname, user_lastname, user_email, user_password, user_role) 
            VALUES (:firstname, :lastname, :email, :password, :role)
        ");
        return $stmt->execute($data);
    }

    public function sign_up(array $data): array {
        $email = $data['email'] ?? '';
        if ($this->emailExists($email)) {
            return ['success' => false, 'message' => 'Email already exists.'];
        }


        $hashed_password = password_hash($data['password'], PASSWORD_DEFAULT);


        $user_data = [
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'password' => $hashed_password,
            'role' => $data['role'],
        ];


    }
}