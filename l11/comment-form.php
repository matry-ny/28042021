<?php

$genders = [
    'male' => 'Male',
    'female' => 'Female',
];

$programmingLanguages = [
    'Backend' => [
        'php' => 'PHP',
        'python' => 'Python',
        'java' => 'Java',
    ],
    'Frontend' => [
        'js' => 'JavaScript',
        'html' => 'HTML',
        'css' => 'CSS',
    ],
];

$action = isset($commentData, $_GET['id'])
    ? "update.php?id={$_GET['id']}"
    : 'comment-processor.php';

?>
<form action="<?= $action ?>" method="POST">
    <div class="mb-3">
        <label for="username" class="form-label">Name</label>
        <input type="text"
               name="username"
               value="<?= $commentData['username'] ?? '' ?>"
               id="username"
               class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Gender</label>
        <?php foreach ($genders as $id => $label): ?>
        <div class="form-check">
            <input type="radio"
                   name="gender"
                   value="<?= $id ?>"
                   <?= (isset($commentData['gender']) && $commentData['gender'] === $id) ? 'checked' : ''  ?>
                   id="gender-<?= $id ?>"
                   class="form-check-input">
            <label for="gender-<?= $id ?>" class="form-check-label"><?= $label ?></label>
        </div>
        <?php endforeach; ?>
    </div>

    <div class="mb-3">
        <label for="programming_language" class="form-label">Programming language</label>
        <select name="programming_language" id="programming_language" class="form-control">
            <?php foreach ($programmingLanguages as $group => $languages): ?>
            <optgroup label="<?= $group ?>">
                <?php foreach ($languages as $id => $language): ?>
                <option
                        <?= (isset($commentData['programming_language']) && ($commentData['programming_language']) === $id) ? 'selected' : ''  ?>
                        value="<?= $id ?>"><?= $language ?></option>
                <?php endforeach; ?>
            </optgroup>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="comment" class="form-label">Comment</label>
        <textarea name="comment"
                  id="comment"
                  class="form-control"><?= $commentData['comment'] ?? '' ?></textarea>
    </div>

    <button type="submit" class="btn btn-success mb-3">Send</button>

</form>