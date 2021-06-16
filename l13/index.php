<?php

require __DIR__ . '/header.php';

require __DIR__ . '/helpers/request.php';
require __DIR__ . '/helpers/files.php';
require __DIR__ . '/browser.php';

$rout = getRout();
$renderedFile = renderFile();
$browserRout = $renderedFile ? dirname($rout) : $rout;

?>
    <main class="container">

        <a href="index.php?rout=<?= $rout ?>" class="btn btn-primary mb-3">Refresh</a>

        <?php require __DIR__ . '/error.php' ?>
        <?php require __DIR__ . '/success.php' ?>
        <?php require __DIR__ . '/breadcrumbs.php' ?>

        <div class="bg-light p-5 rounded">
            <form method="post" class="row" action="actions/create-dir.php?rout=<?= $rout ?>">
                <div class="col-8">
                    <label for="directory_name_input" class="d-none">Directory Name</label>
                    <input type="text"
                           name="dir_name"
                           id="directory_name_input"
                           class="form-control"
                           placeholder="Directory Name">
                </div>
                <button type="submit" class="btn btn-success col-4">Create Directory</button>
            </form>

            <form method="post"
                  class="row mt-3"
                  enctype="multipart/form-data"
                  action="actions/upload-file.php?rout=<?= $rout ?>">
                <div class="col-8">
                    <label for="file_upload_input" class="d-none">Select File</label>
                    <input type="file"
                           multiple="multiple"
                           name="upload[]"
                           id="file_upload_input"
                           class="form-control">
                </div>
                <button type="submit" class="btn btn-success col-4">Upload</button>
            </form>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <ul class="mt-3">
                    <?php foreach (getFilesList() as $file): ?>
                        <li>
                            <?php $browserFile = "{$browserRout}/{$file}"; ?>
                            <a href="index.php?rout=<?= $browserFile ?>">
                                <?= $file ?>
                            </a>
                            <?php if (isFile($browserFile)): ?>
                            <a href="actions/download.php?rout=<?= $browserFile ?>"
                               class="text-decoration-none">
                                <i class="bi bi-cloud-download-fill m-2 text-success"></i>
                            </a>
                            <?php endif; ?>
                            <?php if ($file !== '..'): ?>
                            <a href="actions/delete.php?rout=<?= $browserFile ?>"
                               class="text-decoration-none">
                                <i class="bi bi-trash text-danger"></i>
                            </a>
                            <i class="bi bi-pencil text-warning edit-button"
                               style="cursor: pointer"
                               data-rout="<?= $browserFile ?>"
                               data-old-name="<?= $file ?>"></i>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="col-lg-8">
                <?= renderFile() ?>
            </div>
        </div>
    </main>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <input type="hidden" name="old_name">

                        <label for="new_name_input" class="d-none">New Element Name</label>
                        <input type="text"
                               name="new_name"
                               id="new_name_input"
                               placeholder="Enter new element name"
                               class="form-control">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="renameButton">Save changes</button>
                </div>
            </div>
        </div>
    </div>
<?php

require __DIR__ . '/footer.php';
