<?php

require_once (__DIR__ . '/../models/User.php'); 
require_once (__DIR__ . '/../config/db.php');
require_once (__DIR__ . '/../../core/BaseController.php');

class AuthController extends BaseController {
    private $UserModel;

    public function __construct() {
        $db = Db::Getinstanse();
        $this->UserModel = new User($db);
    }


    public function showRegister() {
        $this->render('sign_up');
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
                echo $result['message'];
            } else {
                echo $result['message'];
            }
        }
    }
}