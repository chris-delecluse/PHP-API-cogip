<?php $title = "home" ?>
<?php ob_start() ?>

    <h1>home page !</h1>

<?php $content = ob_get_clean() ?>
<?php require('layouts/layout.php') ?>