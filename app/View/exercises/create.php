<header class="heading answering">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="/css/exercises.css">
    <link rel="stylesheet" href="/css/index.css">
    <section class="container">
        <a href="/"><img src="/assets/logo-84d7d70645fbe179ce04c983a5fae1e6cba523d7cd28e0cd49a04707ccbef56e.png"></a>
    </section>
</header>
<div class="container main row">
    <h1>New Exercise</h1>
    <form action="/exercises" accept-charset="UTF-8" method="post">
        <input name="utf8" type="hidden" value="&#x2713;"/>
        <input type="hidden" name="authenticity_token" value="vud/TP9beMUr9R6ct/0MvJweI1o3M5UYHgmLOUrxTGw/YAjVo21ftD8ynxTsoNjSA1JwQ3Wac1FEegsGV8QrnQ=="/>
        <div class="field">
            <label for="exercise_title">Title</label>
            <input type="text" name="exercise[title]" id="exercise_title"/>
        </div>
        <div class="actions">
            <input type="submit" name="commit" value="Create Exercise" data-disable-with="Create Exercise"/>
        </div>
    </form>
</div>