<?php

require __DIR__ . '/header.php';

$comments = require __DIR__ . '/comments-list.php';

?>

<main class="container">
    <div class="bg-light p-5 rounded">
        <form action="comment-processor.php" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Name</label>
                <input type="text" name="username" id="username" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Gender</label>
                <div class="form-check">
                    <input type="radio" name="gender" value="male" id="gender-male" class="form-check-input">
                    <label for="gender-male" class="form-check-label">Male</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="gender" value="female" id="gender-female" class="form-check-input">
                    <label for="gender-female" class="form-check-label">Female</label>
                </div>
            </div>

            <div class="mb-3">
                <label for="programming_language" class="form-label">Programming language</label>
                <select name="programming_language" id="programming_language" class="form-control">
                    <optgroup label="Backend">
                        <option value="php">PHP</option>
                        <option value="python">Python</option>
                        <option value="java">Java</option>
                    </optgroup>
                    <optgroup label="Frontend">
                        <option value="js">JavaScript</option>
                        <option value="html">HTML</option>
                        <option value="css">CSS</option>
                    </optgroup>
                </select>
            </div>

            <div class="mb-3">
                <label for="comment" class="form-label">Comment</label>
                <textarea name="comment" id="comment" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-success mb-3">Send</button>

        </form>
    </div>

    <?php foreach ($comments as $date => $commentsList): ?>
        <div class="alert alert-primary" role="alert">
            <?= $date ?>
        </div>
        <table class="table table-striped">
        <?php foreach ($commentsList as $file => $comment): ?>
            <tr>
                <td>
                    <b><?= $comment['username'] ?></b><br>
                    <?= $comment['gender'] ?><br>
                    <?= $comment['programming_language'] ?>
                </td>
                <td>
                    <b><?= date('F j, Y, H:i', $comment['time']) ?></b><br>
                    <?= nl2br($comment['comment']) ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </table>
    <?php endforeach; ?>
</main>
<?php

require __DIR__ . '/footer.php';
