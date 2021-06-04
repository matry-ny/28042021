<?php

require __DIR__ . '/header.php';

?>

    <main class="container">
        <div class="alert alert-danger" role="alert">
            <?= $_GET['message'] ?? 'Server error. Please, try later' ?>
        </div>
    </main>
    <script>
        setTimeout(function () {
            window.location.href = 'http://skillup.local:2804/l11/forms.php';
        }, 5000)
    </script>
<?php

require __DIR__ . '/footer.php';
