<?php 

class BaseController
{ 
    public function render($view, $data = []) {
        extract($data); 
        $viewPath = __DIR__ . '/../app/views/' . $view . '.php';
        if (file_exists($viewPath)) {
            include $viewPath;
        } else {

            echo "View not found: " . $viewPath;
        }
    }
    
    public function renderDashboard($view, $data = [])
    {
        
        extract($data);
        include __DIR__ . '/../app/views/dashboard/' . $view . '.php';
    }
   
   
}
