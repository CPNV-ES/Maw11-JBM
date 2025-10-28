<link rel="stylesheet" href="/css/buttons.css">
<?php

// default value if not set
$icon = $icon ?? 'close';
$color = $color ?? 'primary';
$classes = $classes ?? '';

// dinamic css classes
$colorClass = "btn-{$color}";

?>
<button type="button" 
    class="btn btn-default btn-small <?= $colorClass ?> <?= htmlspecialchars($classes, ENT_QUOTES, 'UTF-8') ?>">

    <?php if ($icon === 'close'): ?>
        <!-- Close icon -->
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
        </svg>

    <?php endif; ?>
</button>
