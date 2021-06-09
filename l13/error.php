<?php if (isset($_GET['error_message'])): ?>
<div class="alert alert-danger" role="alert">
    <?= $_GET['error_message'] ?>
</div>
<?php endif; ?>