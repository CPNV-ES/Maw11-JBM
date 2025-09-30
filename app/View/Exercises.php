<link rel="stylesheet" href="/css/Exercises.css">
<ul>
    <?php foreach (['Bash', 'Python', 'Javascript','PHP','GIT','C++','C#'] as $title): ?>
    <li>
        <div class="column card">
            <div class="title"><?= $title ?></div>
            <a class="button" href="">Take it</a>
        </div>
    </li>
    <?php endforeach; ?>
</ul>