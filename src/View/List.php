<?php include __DIR__ . '/header.php'; ?>

<!-- zawartość strony -->

<!-- TODO:

- lepszy wyglad
- zagniezdzenie statusu
 - dodanie X z eventem usuwajacym
 - dodanie formularza dodawania
  - dodanie miejsca z obsługą ew. błędów

-->

  <h2>Lista zadań do wykonania</h2>

  <?php if (!empty($data)) : ?>
    
    <ul class="list-group">
        <?php foreach ($data as $task): ?>
            <?php

                $priority = (int)$task['priority'];
                $priorityClass = match (true) {
                $priority >= 3 => 'bg-danger-subtle',   
                $priority === 2 => 'bg-warning-subtle',            
                $priority === 1 => 'bg-success-subtle',
                default => 'bg-light'
            };

            ?>
        <li class="list-group-item <?= $priorityClass ?>">
            <div class="d-flex flex-row justify-content-between">
                <div>
                    <div>
                        <?= htmlspecialchars($task['title']) ?>   
                    </div>
                </div>
                <div>
                    <a href="?action=delete&id=<?= $task['id'] ?>" class="btn btn-danger btn-sm" title="Usuń">
                        <i class="bi bi-x"></i>
                    </a>
                </div>
            </div>
            
        </li>
        <?php endforeach; ?>
    </ul>

    <?php else : ?>
        <p>Brak zadań do wyświeltenia</p>
    <?php endif; ?>

<?php include __DIR__ . '/footer.php'; ?>