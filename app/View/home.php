<?php $title = 'Home';
$isHome      = true ?>
<div class="homepage-container">
    <main class="content">
        <div class="buttons-container">
            <?php
                $href = '/exercises/answering';
$color                = 'purple';
$label                = 'TAKE AN EXERCISE';
$icon                 = null;
include __DIR__ . '/../../core/buttons/navigation.php';
?>
            <?php
    $href = '';
$label    = 'CREATE AN EXERCISE';
$color    = 'orange';
$icon     = null;
include __DIR__ . '/../../core/buttons/navigation.php';
?>
            <?php
    $href = '/exercises';
$label    = 'MANAGE AN EXERCISE';
$color    = 'green';
$icon     = null;
include __DIR__ . '/../../core/buttons/navigation.php';
?>
        </div>
    </main>
</div>