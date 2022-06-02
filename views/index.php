<?php $title = "home" ?>
<?php ob_start() ?>

    <h1 class="mt-10 text-3xl font-bold text-center">home page !</h1>

<?php $content = ob_get_clean() ?>
<?php require('layouts/layout.php') ?>