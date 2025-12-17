<?php $title = 'Answering'; ?>
<div class="container main">
    <h1>Your take</h1>
    <p>Bookmark this page, it's yours. You'll be able to come back later to finish</p>
    <form action="<?= '/exercises/' . $exercise['id'] . '/fulfillments/' . $result['id'] . '/edit' ?>" accept-charset="UTF-8" method="post">
        <input type="hidden" name="exercises_id" value="<?= $exercise['id'] ?>">
        <input type="hidden" name="_method" value="PUT">
        <?php foreach ($exercise['fields'] as $field): ?>
            <?php foreach ($result['fulfillments'] as $fulfillment): ?>
            <?php if ($fulfillment['fields_id'] == $field['id']): ?>
                <div class="field">
                    <label for="answer_<?=$field['id']?>"><?= $field['label'] ?></label>
                    <input value="<?=$fulfillment['answer'] ?>" type="text" name="answer_<?=$fulfillment['id']?>" id="answer_<?=$field['id']?>">
                </div>
                <?php endif; ?>
                <?php endforeach; ?>
        <?php endforeach; ?>
        <div class="actions">
            <input type="submit">
        </div>
    </form>
</div>