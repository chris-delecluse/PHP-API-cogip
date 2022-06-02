<?php $title = "404 not found" ?>
<?php ob_start() ?>

    <h1 class="mt-10 text-3xl font-bold text-center">404 not found !</h1>

<?php $content = ob_get_clean() ?>
<?php require('layouts/layout.php') ?>