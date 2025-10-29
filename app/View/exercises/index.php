<header class="heading answering">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="/css/exercises.css">
    <link rel="stylesheet" href="/css/index.css">
    <section class="container">
        <a href="/"><img src="/assets/logo-84d7d70645fbe179ce04c983a5fae1e6cba523d7cd28e0cd49a04707ccbef56e.png"></a>
    </section>
</header>
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
            <?php foreach (($buildings ?? []) as $key => $value): ?>
                <tr>
                    <td><?= htmlspecialchars($value['title'] ?? '') ?></td>
                    <td>
                        <?php 
                            $icon = 'edit'; 
                            $href = '/exercises'; 
                            $label = 'test'; 
                            $classes = 'test'; 
                            include __DIR__ . '/../../../core/buttons/action.php'; 
                        ?>
                        <?php 
                            $icon = 'delete'; 
                            $href = '/exercises'; 
                            $label = 'test'; 
                            $classes = 'test'; 
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
            <?php foreach (($answerings ?? []) as $key => $value): ?>
                <tr>
                    <td><?= htmlspecialchars($value['title'] ?? '') ?></td>
                    <td>
                        <?php 
                            $icon = 'stats'; 
                            $href = '/exercises'; 
                            $label = 'test'; 
                            $classes = 'test'; 
                            include __DIR__ . '/../../../core/buttons/action.php'; 
                        ?>
                        <?php 
                            $icon = 'close'; 
                            $href = '/exercises'; 
                            $label = 'test'; 
                            $classes = 'test'; 
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
            <?php foreach (($closed ?? []) as $key => $value): ?>
                <tr>
                    <td><?= htmlspecialchars($value['title'] ?? '') ?></td>
                    <td>
                        <?php 
                            $icon = 'stats'; 
                            $href = '/exercises'; 
                            $label = 'test'; 
                            $classes = ''; 
                            include __DIR__ . '/../../../core/buttons/action.php'; 
                        ?>
                        <?php 
                            $icon = 'delete'; 
                            $href = '/exercises'; 
                            $label = 'test';
                            $classes = 'test'; 
                            include __DIR__ . '/../../../core/buttons/action.php'; 
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</div>
