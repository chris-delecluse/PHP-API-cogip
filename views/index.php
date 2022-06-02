<?php
$title = "home";
ob_start();
?>

<h1>home page !</h1>

<?php
$content = ob_get_clean();
require('layouts/layout.php');