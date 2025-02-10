<?php 

// $data = [
//     'student_id' => $_SESSION['id'],
//     'firstname' => $_SESSION['firstname'],
//     'lastname' => $_SESSION['lastname'],
//     'email' => $_SESSION['email'],
//     'profile' => $_SESSION['profile']
// ];

require_once (__DIR__ . '/../models/User.php'); 
require_once (__DIR__ . '/../config/db.php');
require_once (__DIR__ . '/../../core/BaseController.php');

class studentController extends BaseController {

    private $UserModel;
    private $connetion;

    public function __construct() {
        $db = Db::Getinstanse();
        $this->UserModel = new User($db);
        $this->connetion = $db->getconnection();
    }

    public function showstudentboard(){
        $data = [
            'id' => $_SESSION['id'],
            'firstname' => $_SESSION['firstname'],
            'lastname' => $_SESSION['lastname'],
            'email' => $_SESSION['email'],
            'role' => $_SESSION['role'],
            'profile' => $_SESSION['profile']
        ];

        require_once (__DIR__ . '/../models/presentation.php');
        $presentationModel = new presentation(Db::Getinstanse());
        $data['presentations'] = $presentationModel->getAllPresentations();
    
        $this->render('Student_board', $data);
    }

    public function logout(){
        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['logout'])){
            $this->UserModel->signout();
        }
    }
}