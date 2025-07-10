<?php 

namespace App\Controller;

use App\Model\Task;

class TaskController {
    private Task $app;

    private ?string $error;

    private $data;

    private bool $status;

    public function __construct()
    {
         $this->app = new Task;
         $this->error = null;
         $this->data = null;
         $this->status = false;
    }

    public function getData(): mixed {
        return $this->data;
    }

    public function getError(): ?string {
        return $this->error;
    }

    public function getStatus(): bool {
        return $this->status;
    }

    public function handleRequests() {
                 $action = $_GET['action'] ?? 'list';
                    switch($action) {
                        case "delete":

                             if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
                                $idExist = $this->app->checkIfTaskIdExist($_GET['id']);

                                    if ($idExist == 1) {
                                            $this->status =  $this->app->deleteByTaskId($_GET['id']);

                                            if ($this->status) {
                                                header("Location: " . rtrim(dirname($_SERVER['PHP_SELF']), '/') . "/"); exit;
                                            }

                                        } else {
                                            $this->error = "Brak ID!";
                                        }
                                    }
                            
                            break;
                        case "add":

                            if (isset($_GET['topic']) && isset($_GET['priority'])) {
                                $this->status =  $this->app->addTask($_GET['topic'], $_GET['priority']);

                                if ($this->status) {
                                    header("Location: " . rtrim(dirname($_SERVER['PHP_SELF']), '/') . "/"); exit;
                                }

                            } else {
                                $this->error = "Brak ID lub prioritetu!";
                            }

                            break;
                        default:

                            $this->data = $this->app->getAll();

                            break;    
                    }
                
            
        
    }
}

?>