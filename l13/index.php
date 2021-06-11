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
                            <a href="index.php?rout=<?= $browserRout ?>/<?= $file ?>">
                                <?= $file ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="col-lg-8">
                <?= renderFile() ?>
            </div>
        </div>
    </main>
<?php

require __DIR__ . '/footer.php';
