<header class="heading answering">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="/css/exercises.css">
    <link rel="stylesheet" href="/css/index.css">
    <section class="container">
        <a href="/"><img src="/assets/logo-84d7d70645fbe179ce04c983a5fae1e6cba523d7cd28e0cd49a04707ccbef56e.png"></a>
    </section>
</header>
<div class="container main">
    <h1>New Exercise</h1>
    <form action="/exercises" accept-charset="UTF-8" method="post" enctype="multipart/form-data">
        <div class="field">
            <label for="exercise_title">Title</label>
            <input type="text" name="exercise_title" id="exercise_title" required/>
        </div>
        <div class="actions">
            <input type="submit" name="commit" value="Create Exercise" data-disable-with="Create Exercise"/>
        </div>
    </form>
</div>