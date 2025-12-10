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
            <?php foreach (($buildings ?? []) as $value): ?>
                <tr>
                    <td><?= htmlspecialchars($value['title'] ?? '') ?></td>
                    <td>
                        <?php 
                            $icon = 'edit'; 
                            $href = '/exercises/' . ($value['id'] ?? '');
                            $label = 'edit';
                            $classes = 'edit';
                            $method = 'PUT';
                            include __DIR__ . '/../../../core/buttons/action.php';
                        ?>
                        <?php
                            $icon = 'delete';
                            $href = '/exercises/' . ($value['id'] ?? '');
                            $label = 'delete'; 
                            $classes = 'delete'; 
                            $method = 'POST';
                            $confirm = true;
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
            <?php foreach (($answerings ?? []) as $value): ?>
                <tr>
                    <td><?= htmlspecialchars($value['title'] ?? '') ?></td>
                    <td>
                        <?php 
                            $icon = 'stats'; 
                            $href = '/exercises/' . ($value['id'] ?? '');
                            $label = 'test';
                            $classes = 'test';
                            $method = 'POST';
                            include __DIR__ . '/../../../core/buttons/action.php';
                        ?>
                        <?php
                            $icon = 'close';
                            $href = '/exercises/' . ($value['id'] ?? '');
                            $label = 'test';
                            $classes = 'test';
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
            <?php foreach (($closed ?? []) as $value): ?>
                <tr>
                    <td><?= htmlspecialchars($value['title'] ?? '') ?></td>
                    <td>
                        <?php 
                            $icon = 'stats'; 
                            $href = '/exercises/' . ($value['id'] ?? '');
                            $label = 'test';
                            $classes = '';
                            $method = '';
                            include __DIR__ . '/../../../core/buttons/action.php';
                        ?>
                        <?php
                            $icon = 'delete';
                            $href = '/exercises/' . ($value['id'] ?? '');
                            $label = 'delete';
                            $classes = 'delete'; 
                            $method = 'POST';
                            $confirm = true;
                            include __DIR__ . '/../../../core/buttons/action.php'; 
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</div>
