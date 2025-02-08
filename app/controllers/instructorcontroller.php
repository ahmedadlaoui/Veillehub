<?php 



require_once (__DIR__ . '/../models/User.php'); 
require_once (__DIR__ . '/../config/db.php');
require_once (__DIR__ . '/../../core/BaseController.php');

class instructorontroller extends BaseController {

    private $UserModel;
    private $connetion;

    public function __construct() {
        $db = Db::Getinstanse();
        $this->UserModel = new User($db);
        $this->connetion = $db->getconnection();
    }
    public function showinstructorboard(){
        $data = [
            'id' => $_SESSION['id'],
            'firstname' => $_SESSION['firstname'],
            'lastname' => $_SESSION['lastname'],
            'email' => $_SESSION['email'],
            'role' => $_SESSION['role'],
            'profile' => $_SESSION['profile']
        ];
    
        $this->render('Instructor_board', $data);
    }
}