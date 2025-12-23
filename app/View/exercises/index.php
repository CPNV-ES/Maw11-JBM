<?php $title = 'Exercises'; ?>
<div class="row">
    <section class="col-md-4">
        <h1>Building</h1>
        <table class="table">
            <thead>
            <tr>
                <th>Title</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach (($exercises['building'] ?? []) as $value): ?>
                <tr>
                    <td>
                        <div class="d-flex align-items-start">
                            <span class="flex-grow-1 text-break pe-3" style="min-width:0;"><?= htmlspecialchars($value['title'] ?? '') ?></span>
                            <div class="actions d-flex gap-1 flex-shrink-0">
                                <?php
                                if (!empty($value['fields'])) {
                                    $icon    = 'takeIt';
                                    $href    = '/exercises/' . ($value['id'] ?? '');
                                    $label   = 'Be ready for answers';
                                    $classes = 'takeIt';
                                    $method  = 'POST';
                                    $confirm = false;
                                    $color   = 'primary';
                                    include __DIR__ . '/../../../core/buttons/action.php';
                                }
                                $icon    = 'edit';
                                $href    = '/exercises/' . ($value['id'] ?? '') . '/fields';
                                $label   = 'Edit';
                                $classes = 'edit';
                                $method  = 'GET';
                                $confirm = false;
                                $color   = 'primary';
                                include __DIR__ . '/../../../core/buttons/action.php';

                                $icon    = 'delete';
                                $href    = '/exercises/' . ($value['id'] ?? '');
                                $label   = 'Delete';
                                $classes = 'Delete';
                                $method  = 'POST';
                                $confirm = true;
                                $color   = 'primary';
                                include __DIR__ . '/../../../core/buttons/action.php';
                                ?>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </section>
    <section class="col-md-4">
        <h1>Answering</h1>
        <table class="table">
            <thead>
            <tr>
                <th>Title</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach (($exercises['answering'] ?? []) as $value): ?>
                <tr>
                    <td>
                        <div class="d-flex align-items-start">
                            <span class="flex-grow-1 text-break pe-3" style="min-width:0;"><?= htmlspecialchars($value['title'] ?? '') ?></span>
                            <div class="actions d-flex gap-1 flex-shrink-0">
                                <?php
                                $icon = 'stats';
                                $href     = '/exercises/' . ($value['id'] ?? '') . '/results';
                                $label    = 'Show results';
                                $classes  = 'stats';
                                $method   = 'GET';
                                $color    = 'primary';
                                $confirm  = false;
                                include __DIR__ . '/../../../core/buttons/action.php';

                                $icon = 'close';
                                $href     = '/exercises/' . ($value['id'] ?? '');
                                $label    = 'Close';
                                $classes  = 'Close';
                                $method   = 'POST';
                                include __DIR__ . '/../../../core/buttons/action.php';
                                ?>
                                </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </section>
    <section class="col-md-4">
        <h1>Closed</h1>
        <table class="table">
            <thead>
            <tr>
                <th>Title</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach (($exercises['closed'] ?? []) as $value): ?>
                <tr>
                    <td>
                        <div class="d-flex align-items-start">
                            <span class="flex-grow-1 text-break pe-3" style="min-width:0;"><?= htmlspecialchars($value['title'] ?? '') ?></span>
                            <div class="actions d-flex gap-1 flex-shrink-0">
                                <?php
                                $icon = 'stats';
                                $href     = '/exercises/' . ($value['id'] ?? '') . '/results';
                                $label    = 'Show results';
                                $classes  = 'stats';
                                $method   = 'GET';
                                $color    = 'primary';
                                $confirm  = false;
                                include __DIR__ . '/../../../core/buttons/action.php';

                                $icon = 'delete';
                                $href     = '/exercises/' . ($value['id'] ?? '');
                                $label    = 'Delete';
                                $classes  = 'delete';
                                $method   = 'POST';
                                $confirm  = true;
                                include __DIR__ . '/../../../core/buttons/action.php';
                                ?>
                                </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</div>
