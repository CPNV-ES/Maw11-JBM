<?php $title = 'Answering' ?>
    <ul class="list-unstyled d-flex flex-column align-items-center gap-3">
            <?php foreach (($exercises ?? []) as $exercise): ?>
                <li class="w-75">
                    <div class="card p-3 bg-custom-light border-0">
                        <div class="h3 text-center mb-3"><?= htmlspecialchars($exercise['title'], ENT_QUOTES, 'UTF-8') ?></div>
                        <?php
                        $href     = '/exercises/' . $exercise['id'] . '/fulfillments/new';
                $color            = 'purple';
                $label            = 'Take it';
                $icon             = null;
                include __DIR__ . '/../../../core/buttons/navigation.php';
                ?>
                    </div>
                </li>
            <?php endforeach; ?>
    </ul>