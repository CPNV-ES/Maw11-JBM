<?php $title = 'Answering'; ?>
<div class="container main">
    <h1>Your take</h1>
    <p>If you'd like to come back later to finish, simply submit it with blanks</p>
    <form action="<?= '/exercises/' . $exercise['id']. '/results' ?>" accept-charset="UTF-8" method="post">
        <?php foreach ($exercise['fields'] as $field): ?>
        <div class="field">
            <label for="result"><?= $field['label'] ?></label>
            <input type="text" name="result_<?=$field['id']?>" id="result">
        </div>
        <?php endforeach; ?>
        <div class="actions">
            <input type="submit">
        </div>
    </form>
</div>