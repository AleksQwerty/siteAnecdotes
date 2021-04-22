<?php
if (!empty($_SESSION['message'])){
    $text = $_SESSION['message']['text'];
    $status = $_SESSION['message']['status'];
    echo "<p class=\"$status\">$text</p>";
    $_SESSION['message'] = null;
}