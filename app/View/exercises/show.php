<?php $title = 'Answering'; ?>
<div class="container main">
    <h1>Your take</h1>
    <p>If you'd like to come back later to finish, simply submit it with blanks</p>
    <form action="/exercises/58/fulfillments" accept-charset="UTF-8" method="post"><input name="utf8" type="hidden" value="✓"><input type="hidden" name="authenticity_token" value="">
        <input type="hidden" value="190" name="fulfillment[answers_attributes][][field_id]" id="fulfillment_answers_attributes__field_id">
        <div class="field">
            <label for="fulfillment_answers_attributes__value">TEST</label>
            <input type="text" name="fulfillment[answers_attributes][][value]" id="fulfillment_answers_attributes__value">
        </div>
        <div class="actions">
            <input type="submit" name="commit" value="Save" data-disable-with="Save">
        </div>
    </form>
</div>
