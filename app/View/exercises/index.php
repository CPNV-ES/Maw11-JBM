<?php $title = 'Exercises'; ?>
<div class="container main row">
    <section class="column">
        <h1>Building</h1>
        <table class="records">
            <thead>
            <tr>
                <th>Title</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach (($exercises['building'] ?? []) as $value): ?>
                <tr>
                    <td><?= htmlspecialchars($value['title'] ?? '') ?></td>
                    <td>
                        <?php if (!empty($value['fields'])){
                            $icon = 'takeIt';
                            $href = '/exercises/' . ($value['id'] ?? '');
                            $label = 'Be ready for answers';
                            $classes = 'takeIt';
                            $method = 'POST';
                            $confirm = false;
                            $color = 'primary';
                            include __DIR__ . '/../../../core/buttons/action.php';
                        } ?>
                        <?php
                            $icon = 'edit';
                            $href = '/exercises/' . ($value['id'] ?? '') . '/fields';
                            $label = 'Edit';
                            $classes = 'edit';
                            $method = 'GET';
                            $confirm  = false;
                            $color = 'primary';
                            include __DIR__ . '/../../../core/buttons/action.php';
                        ?>
                        <?php
                            $icon = 'delete';
                            $href     = '/exercises/' . ($value['id'] ?? '');
                            $label    = 'delete';
                            $classes  = 'delete';
                            $method   = 'POST';
                            $confirm  = true;
                            $color = 'danger';
                            include __DIR__ . '/../../../core/buttons/action.php';
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </section>
    <section class="column">
        <h1>Answering</h1>
        <table class="records">
            <thead>
            <tr>
                <th>Title</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach (($exercises['answering'] ?? []) as $value): ?>
                <tr>
                    <td><?= htmlspecialchars($value['title'] ?? '') ?></td>
                    <td>
                        <?php
                            $icon = 'stats';
                            $href = '/exercises/' . ($value['id'] ?? '') . '/results';
                            $label = 'Show results';
                            $classes = 'stats';
                            $method = 'GET';
                            $color = 'primary';
                            $confirm = false;
                            include __DIR__ . '/../../../core/buttons/action.php';
                        ?>
                        <?php
                            $icon = 'close';
                            $href = '/exercises/' . ($value['id'] ?? '');
                            $label = 'close';
                            $classes = 'close';
                            $method = 'POST';
                            include __DIR__ . '/../../../core/buttons/action.php'; 
                        ?>

                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </section>
    <section class="column">
        <h1>Closed</h1>
        <table class="records">
            <thead>
            <tr>
                <th>Title</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach (($exercises['closed'] ?? []) as $value): ?>
                <tr>
                    <td><?= htmlspecialchars($value['title'] ?? '') ?></td>
                    <td>
                        <?php
                    $icon = 'stats';
                $href     = '/exercises/' . ($value['id'] ?? '');
                $label    = 'test';
                $classes  = '';
                $method   = '';
                include __DIR__ . '/../../../core/buttons/action.php';
                ?>
                        <?php
                    $icon = 'delete';
                $href     = '/exercises/' . ($value['id'] ?? '');
                $label    = 'delete';
                $classes  = 'delete';
                $method   = 'POST';
                $confirm  = true;
                include __DIR__ . '/../../../core/buttons/action.php';
                ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</div>
