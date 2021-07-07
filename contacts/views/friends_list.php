<?php

/**
 * @var array $users
 * @var int $totalPages
 * @var int $currentPage
 * @var string $paginationUrl
 */

$hasPrevPage = $currentPage > 1;
$hasNextPage = $currentPage < $totalPages;

?>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Birthday</th>
        <th scope="col">Created At</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
        <tr>
            <th scope="row"><?= $user['id'] ?></th>
            <td><?= $user['name'] ?: $user['login'] ?></td>
            <td><?= $user['birthday'] ?: '--' ?></td>
            <td><?= $user['created_at'] ?></td>
            <td>
                <?php if ($user['is_my_friend']): ?>
                    <a href="/friends/delete?id=<?= $user['id'] ?>" class="btn btn-sm btn-danger">Remove Friend</a>
                <?php else: ?>
                    <a href="/friends/add?id=<?= $user['id'] ?>" class="btn btn-sm btn-success">Add Friend</a>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<nav aria-label="Page navigation example">
    <ul class="pagination">
        <?php if ($hasPrevPage): ?>
            <li class="page-item">
                <a class="page-link" href="<?= $paginationUrl ?>?page=<?= $currentPage - 1 ?>">Previous</a>
            </li>
        <?php endif; ?>
        <?php for($i = 1; $i <= $totalPages; $i++): ?>
            <li class="page-item <?= $i === $currentPage ? 'active' : '' ?>">
                <a class="page-link" href="<?= $paginationUrl ?>?page=<?= $i ?>"><?= $i ?></a>
            </li>
        <?php endfor; ?>
        <?php if ($hasNextPage): ?>
            <li class="page-item">
                <a class="page-link" href="<?= $paginationUrl ?>?page=<?= $currentPage + 1 ?>">Next</a>
            </li>
        <?php endif; ?>
    </ul>
</nav>