<?php
$title      = 'Exercises';
$labelTitle = $results['exercise_title'];
?>
<h1><?= $results['result_date'] ?></h1>
<dl class="mt-4">
    <?php foreach ($results['fulfillments'] as $result): ?>
        <dt class="fw-bold mt-3"><?= htmlspecialchars($result['field_label']) ?></dt>
        <dd class="ms-3 mt-3 mb-6 text-muted"> <span class="me-2">•</span><?= htmlspecialchars($result['answer']) ?></dd>
    <?php endforeach; ?>
</dl>
