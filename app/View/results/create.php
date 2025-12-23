<?php $title = 'Answering';
$labelTitle = $exercise['title']; ?>
    <h1>Your take</h1>
    <p class="lead">If you'd like to come back later to finish, simply submit it with blanks</p>
    <form action="<?= '/exercises/' . $exercise['id'] . '/results' ?>" accept-charset="UTF-8" method="post">
        <input type="hidden" name="exercises_id" value="<?= $exercise['id'] ?>">
        <?php foreach ($exercise['fields'] as $field): ?>
        <div class="field mb-3">
            <label class="form-label fw-bold" for="answer_<?=$field['id']?>"><?= $field['label'] ?></label>
            <input class="form-control" type="text" name="answer_<?=$field['id']?>" id="answer_<?=$field['id']?>">
        </div>
        <?php endforeach; ?>
        <div class="actions">
            <input class="btn btn-purple" type="submit" name="commit" value="Save" data-disable-with="Save"/>
        </div>
    </form>