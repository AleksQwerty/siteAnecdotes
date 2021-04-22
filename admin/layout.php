<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
?>

<?php require 'templates/header.php' ?>

<main style="margin: 50px 30px 150px">
<?php require "elem/info.php";?>
<?=$content?>

</main>
<?php require 'templates/footer.php' ?>

