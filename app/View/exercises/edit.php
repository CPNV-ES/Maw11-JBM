<?php
$title      = 'New';
$labelTitle = $exercises['title'];
?>
<div class="container main">
    <div class="row">
        <section class="column"> 
            <h1>Fields</h1>
            <table class="records">
                <thead>
                <tr>
                    <th>Label</th>
                    <th>Value kind</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($exercises['fields'] as $exercise): ?>
                    <tr>
                        <td><?=$exercise['label']?></td>
                        <td><?=$exercise['value_kind']?></td>
                        <td><a href="/exercises/<?=$exercises['id'] . '/fields/' . $exercise['id'] . '/edit'?>">Edit</a></td>
                        <td><a href="/exercises/<?=$exercises['id'] . '/fields/' . $exercise['id'] . '/delete'?>">Delete</a></td>
                <?php endforeach; ?>
                </tbody>
            </table>
            <a data-confirm="Are you sure? You won&#39;t be able to further edit this exercise" class="button" rel="nofollow" data-method="put" href="/exercises/463?exercise%5Bstatus%5D=answering"><i class="fa fa-comment"></i> Complete and be ready for answers</a>
        </section>
        <section class="column">
            <h1>New Field</h1>
            <form action="/exercises/<?=$exercises['id'] . '/fields'?>" accept-charset="UTF-8" method="POST"><input name="utf8" type="hidden"/><input type="hidden" name="authenticity_token" />
                <div class="field">
                    <label for="field_label">Label</label>
                    <input type="text" name="field_label" id="field_label" />
                    <input type="hidden" name="exercises_id" value="<?=$exercises['id']?>">
                </div>
                <div class="field">
                    <label for="field_value_kind">Value kind</label>
                    <select name="field_value_kind" id="field_value_kind"><option selected="selected" value="single_line">Single line text</option>
                        <option value="single_line_list">List of single lines</option>
                        <option value="multi_line">Multi-line text</option></select>
                </div>
                <div class="actions">
                    <input type="submit" name="commit" value="Create Field" data-disable-with="Create Field" />
                </div>
            </form>
        </section>
    </div>
</div>