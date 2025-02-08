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
    
        if ($this->insertUser($user_data)) {
            return ['success' => true, 'message' => 'Registration successful!'];
        }
    
        return ['success' => false, 'message' => 'Failed to register. Please try again.'];
    }


    public function login($email,$password){
        
        

        $stmt =  $this->db->prepare("SELECT * FROM users");
        $stmt->execute();
        $users_array = $stmt->FetchALL(PDO::FETCH_ASSOC);

        foreach($users_array as $user){
            if($user['user_email'] === $email &&  password_verify($password, $user['user_password'])){

                session_start();
                $_SESSION['id'] = $user['User_id'];
                $_SESSION['firstname'] = $user['user_firstname'];
                $_SESSION['lastname'] = $user['user_lastname'];
                $_SESSION['email'] = $user['user_email'];
                $_SESSION['role'] = $user['user_role'];
                $_SESSION['profile'] = $user['user_profile'];
                
                if($_SESSION['role'] === 'student'){
                    header("location: /manager/public/Student_board");
                }
                

            }
        }

    }

    public function signout(){
        session_start();
        session_unset();
        session_destroy();
        header("location: /manager/public/sign_in");
    }
}