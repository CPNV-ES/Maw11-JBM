<header class="heading answering">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="/css/exercises.css">
    <link rel="stylesheet" href="/css/index.css">
    <section class="container">
        <a href="/"><img src="/assets/logo-84d7d70645fbe179ce04c983a5fae1e6cba523d7cd28e0cd49a04707ccbef56e.png"></a>
    </section>
</header>
<div class="container main">
    <div class="row">
        <section class="column"> 
            <h1>Fields</h1> 
            <table class="records">
                <thead>
                <tr>
                    <th>Label</th>
                    <th>Value kind</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($fields as $field): ?>
                    <tr>
                        <td><?=$field['label']?></td>
                        <td><?=$field['value_kind']?></td>
                        <td><a href="/exercises/<?=$exercise['id'] . "/fields/" . $field['id'] . "/edit"?>">Edit</a></td>
                        <td><a href="/exercises/<?=$exercise['id'] . "/fields/" . $field['id'] . "/delete"?>">Delete</a></td>
                <?php endforeach; ?>
                </tbody>
            </table>
            <a data-confirm="Are you sure? You won&#39;t be able to further edit this exercise" class="button" rel="nofollow" data-method="put" href="/exercises/463?exercise%5Bstatus%5D=answering"><i class="fa fa-comment"></i> Complete and be ready for answers</a>
        </section>
        <section class="column">
            <h1>New Field</h1>
            <form action="/exercises/<?=$exercise['id'] . "/fields"?>" accept-charset="UTF-8" method="post"><input name="utf8" type="hidden" value="&#x2713;" /><input type="hidden" name="authenticity_token" />
                <div class="field">
                    <label for="field_label">Label</label>
                    <input type="text" name="field_label" id="field_label" />
                    <input type="hidden" name="exercise_id" value="<?=$exercise['id']?>">
                </div>
                <div class="field">
                    <label for="field_value_kind">Value kind</label>
                    <select name="field_value_kind" id="field_value_kind"><option selected="selected" value="single_line">Single line text</option>
                        <option value="single_line_list">List of single lines</option>
                        <option value="multi_line">Multi-line text</option></select>
                </div>
                <div class="actions">
                    <input type="submit" name="commit" value="Create Field" data-disable-with="Create Field" />
                </div>
            </form>
        </section>
    </div>
</div>