<?php
$title = 'New';
$labelTitle = $exercise['title'];
?>
<div class="container main">
    <h1><?= $exercise['label'] ?></h1>
    <table class="records">
        <thead>
        <tr>
            <th>Take</th>
            <th>Content</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($exercise['answers'] as $result): ?>
        <tr>
            <td><a href="<?= htmlspecialchars("/exercises/". $exercise['id'] . "/fulfillments/". $exercise['results_id'], ENT_QUOTES, 'UTF-8')?>"><?= $result['created_at'] ?></a></td>
            <td class="result_value"><?= htmlspecialchars($result['value'], ENT_QUOTES, 'UTF-8' )?></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
