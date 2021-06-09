<?php if (isset($_GET['success_message'])): ?>
<div class="alert alert-success" role="alert">
    <?= $_GET['success_message'] ?>
</div>
<?php endif; ?>