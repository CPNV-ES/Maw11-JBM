<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Sans titre' ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="/css/exercises.css">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/home-page.css">
</head>
<body>
    <?php if (empty($isHome)): ?>
    <header class="heading header-<?= strtolower($title) ?? 'Exercise looper' ?>" >
        <section class="container">
            <a href="/"><img src="/assets/logo-84d7d70645fbe179ce04c983a5fae1e6cba523d7cd28e0cd49a04707ccbef56e.png" alt="Logo looper"></a>
        </section>
    </header>
     <?php else: ?>
    <header class="header header-<?= strtolower($title) ?? 'home' ?>">
        <img alt="Looper logo" src="/assets/logo-84d7d70645fbe179ce04c983a5fae1e6cba523d7cd28e0cd49a04707ccbef56e.png">
        <h1 class="title">Exercise Looper</h1>
    </header>
    <?php endif; ?>
    <main><?= $content ?></main>
</body>
</html>