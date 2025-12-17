<?php $title = "Exercise : " . $results['title'] ?>

<?php //var_dump($results['results'][0]['fulfillments'][1]['answer']);    ;
//exit;?>
<div class="container main">
<table>
  <thead>
    <tr>
      <th>Take</th>
        <?php foreach ($results['fields'] as $field): ?>
        <th><a href=""><?= htmlspecialchars($field['label']) ?></a></th>
        <?php endforeach; ?>
    </tr>
  </thead>

  <tbody>

  <?php foreach ($results['results'] as $result): ?>
      <tr>
        <td>
            <a href="/exercises/417/fulfillments/601">
                <?=$result['created_at'] ?>
            </a>
        </td>
          <?php foreach ($result['fulfillments'] as $fulfillment): ?>
                  <td class="answer">
                      <?php if (strlen($fulfillment['answer']) >= 10): ?>
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M249.9 66.8c10.4-14.3 7.2-34.3-7.1-44.7s-34.3-7.2-44.7 7.1l-106 145.7-37.5-37.5c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l64 64c6.6 6.6 15.8 10 25.1 9.3s17.9-5.5 23.4-13.1l128-176zm128 136c10.4-14.3 7.2-34.3-7.1-44.7s-34.3-7.2-44.7 7.1l-170 233.7-69.5-69.5c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l96 96c6.6 6.6 15.8 10 25.1 9.3s17.9-5.5 23.4-13.1l192-264z"/></svg>
                  </td>
                        <?php else: ?>
                  <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M434.8 70.1c14.3 10.4 17.5 30.4 7.1 44.7l-256 352c-5.5 7.6-14 12.3-23.4 13.1s-18.5-2.7-25.1-9.3l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l101.5 101.5 234-321.7c10.4-14.3 30.4-17.5 44.7-7.1z"/></svg>
                         <?php endif; ?>
          <?php endforeach; ?>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>