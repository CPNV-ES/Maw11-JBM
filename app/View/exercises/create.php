<?php $title = 'New Exercise' ?>
<div class="container main">
    <h1>New Exercise</h1>
    <form action="/exercises" accept-charset="UTF-8" method="post" enctype="multipart/form-data">
        <div class="field">
            <label for="exercise_title">Title</label>
            <input class="input" type="text" name="exercise_title" id="exercise_title" required/>
        </div>
        <div class="actions">
            <input class="button" type="submit" name="commit" value="Create Exercise" data-disable-with="Create Exercise"/>
        </div>
    </form>
</div>