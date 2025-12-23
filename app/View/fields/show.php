<?php
$title      = 'exercises';
$labelTitle = $exercise['title'];
?>
    <h1><?= $exercise['label'] ?></h1>
    <table class="table">
        <thead>
        <tr>
            <th>Take</th>
            <th>Content</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($exercise['answers'] as $result): ?>
        <tr>
            <td><a href="<?= htmlspecialchars('/exercises/' . $exercise['id'] . '/fulfillments/' . $result['results_id'], ENT_QUOTES, 'UTF-8')?>"><?= $result['created_at'] ?></a></td>
            <td><?= htmlspecialchars($result['value'], ENT_QUOTES, 'UTF-8')?></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
