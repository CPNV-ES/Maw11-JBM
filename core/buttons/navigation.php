<?php

// default value if not set
$icon = $icon ?? null;
$color = $color ?? 'purple';
$label = $label ?? 'No label no cookie, set a label!';
$href = $href ?? '/';

$btnClass = match ($color) {
    'purple' => 'btn btn-purple',
    'orange' => 'btn btn-orange',
    'green'  => 'btn btn-green',
    default  => 'btn btn-primary',
};
?>
<a href="<?= htmlspecialchars($href, ENT_QUOTES, 'UTF-8') ?>"
   class="btn <?= $btnClass ?> btn-lg w-100 d-flex align-items-center justify-content-center gap-2 py-3 fw-bold text-uppercase"

    <?php if ($icon === 'takeIt'): ?>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 0 1-2.555-.337A5.972 5.972 0 0 1 5.41 20.97a5.969 5.969 0 0 1-.474-.065 4.48 4.48 0 0 0 .978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25Z" />
        </svg>
    <?php endif; ?>

    <span><?= htmlspecialchars($label, ENT_QUOTES, 'UTF-8') ?></span>
</a>
