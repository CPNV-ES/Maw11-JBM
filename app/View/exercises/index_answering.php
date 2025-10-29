<link rel="stylesheet" href="/css/exercises.css">
<link rel="stylesheet" href="/css/index.css">
<header class="heading answering">
    <section class="container">
        <a href="/"><img src="/assets/logo-84d7d70645fbe179ce04c983a5fae1e6cba523d7cd28e0cd49a04707ccbef56e.png"></a>

    </section>
</header>
<div class="container main">
    <ul>
        <?php if(isset($data)) : ?>
            <?php foreach ($data as $exercise): ?>
                <li>
                    <div class="column card">
                        <div class="title"><?= $exercise['TITLE'] ?></div>
                        <a class="button" href=exercise/<?= $exercise['ID'] ?>>Take it</a>
                    </div>
                </li>
            <?php endforeach; ?>
        <?php endif; ?>
    </ul>
</div>