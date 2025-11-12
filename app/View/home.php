<link rel="stylesheet" href="/css/home-page.css">
<div class="homepage-container">
    <header class="header">
        <img alt="Looper logo" src="/assets/logo-84d7d70645fbe179ce04c983a5fae1e6cba523d7cd28e0cd49a04707ccbef56e.png">
        <h1 class="title">Exercise Looper</h1>
    </header>
    
    <main class="content">
        <div class="buttons-container">
            <?php
                $href = '/exercises/answering';
                $color = 'purple';
                $label = 'TAKE AN EXERCISE';
                $icon = null;
                include __DIR__ . '/../../core/buttons/navigation.php';
            ?>
            <?php
                $href = '';
                $label = 'CREATE AN EXERCISE';
                $color = 'orange';
                $icon = null;
                include __DIR__ . '/../../core/buttons/navigation.php';
            ?>
            <?php
                $href = '/exercises';
                $label = 'MANAGE AN EXERCISE';
                $color = 'green';
                $icon = null;
                include __DIR__ . '/../../core/buttons/navigation.php';
            ?>
        </div>
    </main>
</div>