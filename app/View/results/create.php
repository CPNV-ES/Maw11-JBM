<?php $title = 'Answering'; ?>
<div class="container main">
    <h1>Your take</h1>
    <p>If you'd like to come back later to finish, simply submit it with blanks</p>
    <form action="<?= '/exercises/' . $exercise['id']. 'results' ?>" accept-charset="UTF-8" method="post">
        <?php foreach ($exercise['fields'] as $field): ?>
        <input type="hidden" value="<?= $field['id'] ?>" name="fields_id" id="fields_id">
        <div class="field">
            <label for="result"><?= $field['label'] ?></label>
            <input type="text" name="result" id="result">
        </div>
        <?php endforeach; ?>
        <div class="actions">
            <input type="submit" name="commit" value="Save" data-disable-with="Save">
        </div>
    </form>
</div>
