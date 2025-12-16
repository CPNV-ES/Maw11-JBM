<?php $title = 'Answering' ?>
<div class="container main">
    <ul>
            <?php foreach (($exercises ?? []) as $exercise): ?>
                <li>
                    <div class="column card">
                        <div class="title"><?= htmlspecialchars($exercise['title'], ENT_QUOTES, 'UTF-8') ?></div>
                        <?php
                        $href = '/exercises/' . $exercise['id']. '/fulfillments/new';
                        $color            = 'purple';
                        $label            = 'Take it';
                        $icon             = null;
                        include __DIR__ . '/../../../core/buttons/navigation.php';
                        ?>
                    </div>
                </li>
            <?php endforeach; ?>
    </ul>
</div>
