<?php

$file = __DIR__ . '/storage/' . $_GET['id'];
if (!file_exists($file)) {
    header('Location: error.php?message=Comment is not exists');
    exit;
}

$comment = file_get_contents($file);
$commentData = unserialize($comment);

require __DIR__ . '/header.php';

?>

<main class="container">
    <div class="bg-light p-5 rounded">
        <?php require __DIR__ . '/comment-form.php' ?>
    </div>
</main>
<?php

require __DIR__ . '/footer.php';
