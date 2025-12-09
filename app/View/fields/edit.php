<?php
$title = 'New';
$labelTitle = $exercise['title'];
?>
<div class="container main">
    <h1>Editing Field</h1>
    <form action="/exercises/<?= $exercise['id'] ?>/fields/<?= $field['id'] ?>/edit" accept-charset="UTF-8" method="POST">
        <input type="hidden" name="_method" value="PATCH">
        <input type="hidden" name="field_id" value="<?= $field['id'] ?>">
        <input type="hidden" name="exercise_id" value="<?= $exercise['id'] ?>">
        <div class="field">
            <label for="field_label">Label</label>
            <input class="input" value="<?= $field['label'] ?>" type="text" name="field_label" id="field_label"/>
        </div>
        <div class="field">
            <label for="field_value_kind">Value kind</label>
            <select name="field_value_kind" id="field_value_kind">
                <?php foreach ($allowedKinds as $kind): ?>
                    <option value="<?= htmlspecialchars($kind, ENT_QUOTES) ?>" <?= $kind === $field['value_kind'] ? 'selected' : '' ?> >
                        <?= $kind ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="actions">
            <input class="button" type="submit" name="commit" value="Update Field" data-disable-with="Update Field">
        </div>
    </form>
</div>




