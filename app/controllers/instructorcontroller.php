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
            'profile' => $_SESSION['profile'],
            
        ];
        $data['users'] = $this->UserModel->getallusers();

        $this->render('Instructor_board', $data);
    }

    public function addPresentation() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
           
            $title = isset($_POST['title']) ? trim($_POST['title']) : '';
            $date  = isset($_POST['date']) ? trim($_POST['date']) : '';
            
            if ($title === '' || $date === '') {
                echo "Title and Date are required.";
                exit;
            }
            
            require_once(__DIR__ . '/../models/presentation.php');
            $presentationModel = new presentation(Db::Getinstanse());
            $result = $presentationModel->addPresentation($title, $date);
            
            if ($result) {
                $presentationId = $this->connetion->lastInsertId();
                
                if (isset($_POST['assigned_users']) && is_array($_POST['assigned_users'])) {
                    foreach ($_POST['assigned_users'] as $user_id) {
                        $query = "INSERT INTO assigned_presentations (user_id, presentation_id) VALUES (:user_id, :presentation_id)";
                        $stmt = $this->connetion->prepare($query);
                        $stmt->bindParam(':user_id', $user_id);
                        $stmt->bindParam(':presentation_id', $presentationId);
                        $stmt->execute();
                    }
                }
                header("Location: /manager/public/Instructor_board");
                exit;
            } else {
                echo "Error adding presentation.";
                exit;
            }
        } else {
            header("Location: /manager/public/Instructor_board");
            exit;
        }
    }
}