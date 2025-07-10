<?php include __DIR__ . '/header.php'; ?>

<!-- zawartość strony -->

<!-- TODO:

- lepszy wyglad
- zagniezdzenie statusu
 - dodanie X z eventem usuwajacym
 - dodanie formularza dodawania

-->

  <h2>Lista zadań do wykonania</h2>

  <?php if (!empty($data)) : ?>
    
    <ul class="list-group">
        <?php foreach ($data as $task): ?>
        <li class="list-group-item">
            <?= htmlspecialchars($task['title']) ?>
        </li>
        <?php endforeach; ?>
    </ul>

    <?php else : ?>
        <p>Brak zadań do wyświeltenia</p>
    <?php endif; ?>

<?php include __DIR__ . '/footer.php'; ?>