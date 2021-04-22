<?php
if (!empty($_SESSION['admin_message'])){
    $text = $_SESSION['admin_message']['text'];
    $status = $_SESSION['admin_message']['status'];
    echo "<p class=\"$status\">$text</p>";
    $_SESSION['admin_message'] = null;
}