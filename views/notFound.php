<?php $title = "404 not found" ?>
<?php ob_start() ?>

    <h1>404 not found</h1>

<?php $content = ob_get_clean() ?>
<?php require('layouts/layout.php') ?>