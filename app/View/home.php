<?php $title = 'Home';
$isHome      = true ?>
<div class="homepage-container d-flex flex-column h-100">
    <main class="content d-flex justify-content-center align-items-center flex-grow-1">
        <div class="buttons-container d-flex flex-column flex-md-row gap-4 justify-content-center align-items-stretch w-100" style="max-width: 1000px;">
            <div class="flex-fill">
        <?php
                $href = '/exercises/answering';
$color                = 'purple';
$label                = 'TAKE AN EXERCISE';
$icon                 = null;
include __DIR__ . '/../../core/buttons/navigation.php';
?>
            </div>
            <div class="flex-fill">
            <?php
    $href = '/exercises/new';
$label    = 'CREATE AN EXERCISE';
$color    = 'orange';
$icon     = null;
include __DIR__ . '/../../core/buttons/navigation.php';
?>
            </div>
            <div class="flex-fill">
            <?php
    $href = '/exercises';
$label    = 'MANAGE AN EXERCISE';
$color    = 'green';
$icon     = null;
include __DIR__ . '/../../core/buttons/navigation.php';
?>
            </div>
        </div>
    </main>
</div>