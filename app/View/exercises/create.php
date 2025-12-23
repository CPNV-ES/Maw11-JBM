<?php $title = 'New Exercise' ?>
    <h1>New Exercise</h1>
    <form action="/exercises" accept-charset="UTF-8" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="exercise_title" class="form-label">Title</label>
            <input class="form-control" type="text" name="exercise_title" id="exercise_title" required/>
        </div>
        <div class="actions mt-2">
            <input class="btn btn-purple" type="submit" name="commit" value="Create Exercise" data-disable-with="Create Exercise"/>
        </div>
    </form>