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
            <input type="text" value="<?= $field['label'] ?>" name="field_label" id="field_label">
        </div>
        <div class="field">
            <label for="field_value_kind">Value kind</label>
            <select name="field_value_kind" id="field_value_kind">
                <option selected="selected" value="<?= $field['value_kind'] ?>"><?= $field['value_kind'] ?></option>
                <option selected="selected" value="single_line">Single line text</option>
                <option value="single_line_list">List of single lines</option>
                <option value="multi_line">Multi-line text</option>
            </select>
        </div>
        <div class="actions">
            <input type="submit" name="commit" value="Update Field" data-disable-with="Update Field">
        </div>
    </form>
</div>




