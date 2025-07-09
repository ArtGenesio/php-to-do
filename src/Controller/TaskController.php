<?php 

namespace App\Controller;

use App\Model\Task;

class TaskController {
    private Task $app;

    public function __construct()
    {
         $this->app = new Task;
    }

    public function handleRequests() {
        if ($_GET) {
            if (isset($_GET['action'])) {
                $action = $_GET['action'];

                if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
                    switch($action) {
                        case "delete":
                            break;
                        case "add":
                            break;
                        case "list":
                            break;    
                    }
                } else {
                    $error = "Błąd w id";
                }

                
            }
        }
    }
}

?>