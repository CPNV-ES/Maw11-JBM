<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Sans titre' ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/buttons-action.css">
    <link rel="stylesheet" href="/css/result_icons.css">
</head>
<body>
<?php
$logoUrl = '/assets/logo-84d7d70645fbe179ce04c983a5fae1e6cba523d7cd28e0cd49a04707ccbef56e.png';
$logoImg = '<img src="' . $logoUrl . '" alt="Looper logo">';
$slug = strtolower($title ?? '');

$headerClass = 'header';
$headerSuffix = $slug ?: 'home';
$logoHtml = $logoImg;
$contentHtml = '<h1 class="main-title title">Exercise Looper</h1>';

if (!empty($labelTitle) || $title === 'New Exercise' || empty($isHome)) {
    
    $headerClass = 'heading';
    $logoHtml = '<a href="/">' . $logoImg . '</a>';

    if (!empty($labelTitle)) {
        $headerSuffix = $slug ?: 'Exercise looper';

        $labelContent = ($title !== 'Answering')
                ? '<a href="" class="exercise-label-link">' . $labelTitle . '</a>'
                : '<span class="exercise-label-text">' . $labelTitle . '</span>';

        $contentHtml = '<span class="text-white ms-3 fs-4"> Exercise: ' . $labelContent . ' </span>';

    } elseif ($title === 'New Exercise') {
        $headerSuffix = $slug ?: 'home';
        $contentHtml = '<span class="text-white ms-3 fs-4"> New Exercise </span>';

    } else {
        $headerSuffix = $slug ?: 'home';
        $contentHtml = '';
    }
}
?>
<header class="<?= $headerClass ?> header-<?= $headerSuffix ?> <?= $headerClass === 'header' ? 'd-flex flex-column justify-content-center align-items-center text-white vh-100' : '' ?>" style="<?= $headerClass === 'header' ? 'max-height: 300px;' : '' ?>">
    <?= $logoHtml ?>
    <?= $contentHtml ?>
</header>
<main class="container"><?= $content ?></main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document
        .querySelectorAll('[data-bs-toggle="tooltip"]')
        .forEach(el => new bootstrap.Tooltip(el, {
            offset: [0, 8]
        }))
</script>
</body>
</html>