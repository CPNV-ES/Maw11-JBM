<?php $title = 'Exercises'; ?>
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
                <?php foreach ($exercises['fields'] as $exercise): ?>
                    <tr>
                        <td><?= htmlspecialchars($exercise['label']) ?></td>
                        <td><?= htmlspecialchars($exercise['value_kind']) ?></td>
                        <td class="delete">
                            <form action="/exercises/<?= $exercises['id'] . '/fields/' . $exercise['id'] ?>"
                                  method="GET">
                                <button type="submit"
                                        class="btn btn-close btn-primary btn-small delete btn-context-text"
                                        aria-label="edit" role="button" data-context-text="Edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5"
                                         stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"/>
                                    </svg>
                                </button>
                            </form>
                        </td>
                        <td class="delete">
                            <form action="/exercises/<?= htmlspecialchars($exercises['id'], ENT_QUOTES, 'UTF-8') . '/fields/' . htmlspecialchars($exercise['id'], ENT_QUOTES, 'UTF-8') ?>"
                                  method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="field_id"
                                       value="<?= htmlspecialchars($exercise['id'], ENT_QUOTES, 'UTF-8') ?>">
                                <input type="hidden" name="exercise_id"
                                       value="<?= htmlspecialchars($exercises['id'], ENT_QUOTES, 'UTF-8') ?>">
                                <button type="submit"
                                        class="btn btn-close btn-primary btn-small delete btn-context-text"
                                        aria-label="delete" role="button" data-context-text="Delete"
                                        onclick="return confirm('Are you sure?')">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5"
                                         stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"/>
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <?php if (!empty($exercises['fields'])): ?>
                <form action="/exercises/<?= htmlspecialchars($exercises['id'], ENT_QUOTES, 'UTF-8') ?>"
                      method="POST">
                    <input type="hidden" name="_method" value="PATCH">
                    <input type="hidden" name="status" value="answering">
                    <button type="submit"
                            class="button"
                            role="button"
                            onclick="return confirm('Are you sure ? You won\'t be able to further edit this exercise')">
                        <i class="fa fa-comment"></i> Complete and be ready for answers
                    </button>
                </form>
            <?php endif; ?>
        </section>
        <section class="column">
            <h1>New Field</h1>
            <form action="/exercises/<?= $exercises['id'] . '/fields' ?>" accept-charset="UTF-8" method="POST">
                <input name="utf8" type="hidden"/>
                <div class="field">
                    <label for="field_label">Label</label>
                    <input type="text" name="field_label" id="field_label" required/>
                    <input type="hidden" name="exercises_id" value="<?= $exercises['id'] ?>">
                </div>
                <div class="field">
                    <label for="field_value_kind">Value kind</label>
                    <select name="field_value_kind" id="field_value_kind">
                        <?php foreach ($allowedKinds as $kind): ?>
                            <option value="<?= htmlspecialchars($kind, ENT_QUOTES) ?>">
                                <?= htmlspecialchars($kind, ENT_QUOTES) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="actions">
                    <input type="submit" name="commit" value="Create Field" data-disable-with="Create Field"/>
                </div>
            </form>
        </section>
    </div>
</div>