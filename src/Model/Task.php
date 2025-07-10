<?php 

namespace App\Model;

use PDO;
use PDOStatement;

class Task {
    protected $path = "../../database/todo.sqlite";

    public function connection() : PDO {
        $pdo = new PDO('sqlite:' . __DIR__ . '/../../database/todo.sqlite');

    
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }

    public function getAll() : array|false {
        $pdo = $this->connection();
        $sql = "SELECT * FROM tasks ORDER BY priority DESC";
        $stmt =  $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addTask(string $title, int $priority) : bool {
        $pdo = $this->connection();
        $sql = "INSERT INTO tasks (title, priority) VALUES (:title, :priority)";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([
            'title' => $title,
            'priority' => $priority
        ]);
    }

    public function deleteByTaskId(int $taskId) : bool {
        $pdo = $this->connection();
        $sql = "DELETE from tasks where id = :taskId";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([
            "taskId" => $taskId
        ]);
    }

    public function checkIfTaskIdExist(int $taskId) : int {
        $pdo = $this->connection();
        $sql = "SELECT COUNT(*) FROM tasks WHERE id = :taskId";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute(['taskId' => $taskId])) {
            $count = $stmt->fetchColumn();

            return $count;
        } else {
            return 0;
        }
    }


}

?>