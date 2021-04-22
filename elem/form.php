<?php
function getFormForAddAnecdot($link)
{
    if (isset($_POST['user_name']) && isset($_POST['title']) && isset($_POST['text']) && isset($_POST['category']) && isset($_POST['send'])) {
        $user_name = mysqli_real_escape_string($link, $_POST['user_name']);
        $titleAnecdot = mysqli_real_escape_string($link, $_POST['title']);
        $textAnecdot = mysqli_real_escape_string($link, $_POST['text']);
        $category = $_POST['category'];
        $date = date("Y-m-d H:i:s", time());
        //вставка в табл анекдот
        $query = "INSERT INTO anecdot (user_name, title, text, category, `date`) VALUES ('$user_name', '$titleAnecdot', '$textAnecdot', '$category', '$date')";
        mysqli_query($link, $query) or die(mysqli_error($link));
        $_SESSION['message'] = ['text' => 'Как только админ сайта одобрит ваш анекдот, он сразу же появится на главной странцие сайта', 'status' => 'text-success'];
    }
}
getFormForAddAnecdot($link);