<?php $title = 'Answering' ?>
<div class="container main">
    <ul>
        <?php if (isset($data)) : ?>
            <?php foreach ($data as $exercise): ?>
                <li>
                    <div class="column card">
                        <div class="title"><?= $exercise['TITLE'] ?></div>
                        <a class="button" href=<?= $exercise['ID'] ?>>Take it</a>
                    </div>
                </li>
            <?php endforeach; ?>
        <?php endif; ?>
    </ul>
</div>