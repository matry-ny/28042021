<?php

require __DIR__ . '/header.php';

$comments = require __DIR__ . '/comments-list.php';

?>

<main class="container">
    <div class="bg-light p-5 rounded">
        <?php require __DIR__ . '/comment-form.php' ?>
    </div>

    <table class="table table-striped">
    <?php foreach ($comments as $date => $commentsList): ?>
        <tr>
            <td colspan="2" class="p-0">
                <div class="alert alert-primary mb-0" role="alert">
                    <?= $date ?>
                </div>
            </td>
        </tr>

        <?php foreach ($commentsList as $file => $comment): ?>
            <tr>
                <td>
                    <b><?= $comment['username'] ?></b><br>
                    <?= $comment['gender'] ?><br>
                    <?= $comment['programming_language'] ?>
                </td>
                <td>
                    <b><?= date('F j, Y, H:i', $comment['time']) ?></b>
                    <br>
                    <?= nl2br($comment['comment']) ?>
                    <div>
                        <a href="edit.php?id=<?= "$date/$file" ?>" class="btn btn-sm btn-primary">Edit</a>
                        <a href="delete.php?id=<?= "$date/$file" ?>" class="btn btn-sm btn-danger">Delete</a>
                    </div>
                    <?php if(isset($comment['updatedAt'])): ?>
                        <i>Last update at: <?= date('F j, Y, H:i', $comment['updatedAt']) ?></i>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php endforeach; ?>
    </table>
</main>
<?php

require __DIR__ . '/footer.php';
