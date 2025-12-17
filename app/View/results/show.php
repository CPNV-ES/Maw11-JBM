<?php
$title      = 'exercises';
$labelTitle = $results['exercise_title'];
?>
<div class="container main">
    <h1><?= $results['result_date'] ?></h1>
    <dl>
        <?php foreach ($results['fulfillments'] as $result): ?>
        <dt><?= $result['field_label'] ?></dt>
        <dd><?= $result['answer'] ?></dd>
        <?php endforeach;?>
    </dl>
</div>