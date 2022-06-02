<?php
$title = "404 not found";
ob_start();
?>

<h1>404 not found !</h1>

<?php
$content = ob_get_clean();
require('layouts/layout.php');
