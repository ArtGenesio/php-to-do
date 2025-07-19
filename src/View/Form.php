<?php include __DIR__ . '/header.php'; ?>


                        <form method="get" action="">
                    <div class="mb-3">

                        <input type="hidden" name="action" value="add">
                    
                        <label for="todoField" class="form-label">Treść zadania</label>
                        <input type="string" name="topic" class="form-control" id="todoField" aria-describedby="todoHelp" required>
                        <div id="todoHelp" class="form-text">Podaj zadanie do zapamiętania</div>
                    </div>
                    <div class="mb-3">
                        <label for="priorityField" class="form-label">Priorytet</label>
                        <input type="number" name="priority" class="form-control w-auto" id="priorityField" aria-describedby="priorityHelp" min="0" max="5" required>
                        <div id="priorityHelp" class="form-text">Podaj priorytet zadania od 1 do 5 <strong> (5 jest najważniejszy)! </strong></div>
                    </div>
                    <button type="submit" class="btn btn-primary">Dodaj zadanie</button>
                    </form>

                    <?php if (!empty($error)) : ?>
                        <div class="mt-3 alert alert-danger"><?= htmlspecialchars($error) ?></div>
                    <?php endif; ?>


<?php include __DIR__ . '/footer.php'; ?>