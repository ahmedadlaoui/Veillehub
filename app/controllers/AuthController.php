<?php

require_once (__DIR__ . '/../models/User.php'); 
require_once (__DIR__ . '/../config/db.php');
require_once (__DIR__ . '/../../core/BaseController.php');

class AuthController extends BaseController {
    private $UserModel;
    private $connetion;

    public function __construct() {
        $db = Db::Getinstanse();
        $this->UserModel = new User($db);
        $this->connetion = $db->getconnection();
    }


    public function showRegister() {
        $this->render('sign_up');
    }
    public function showlogin() {
        $this->render('sign_in');
    }

    public function Register() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data = [
                'firstname' => $_POST['first_name'] ?? '',
                'lastname' => $_POST['last_name'] ?? '',
                'email' => $_POST['email'] ?? '',
                'password' => $_POST['password'] ?? '',
                'role' => 'student',
            ];

            $result = $this->UserModel->sign_up($data);

            if ($result['success']) {
                header('Location: /manager/public/sign_up');
            exit();
            } else {
                echo $result['message'];
            }
        }
    }

    public function signin(){
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $this->UserModel->login($email,$password);

        }
    }
}