<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
require "../elem/init.php";
//Реализуйте сайт анекдотов. Юзеры сайта заходят на него, могут в специальной форме предложить анекдот.
$title = 'enterForAdmin';
$content = '';

if (isset($_POST['login']) && isset($_POST['password']) && isset($_POST['send'])){
    $login = $_POST['login'];
    $password = $_POST['password'];
    $query = "SELECT * FROM admin WHERE login = '$login'";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    $user = mysqli_fetch_assoc($result);
    if (!empty($user)){
        $password_hash = $user['password'];
        if (password_verify($password, $password_hash)){
            $_SESSION['admin_auth'] = true;
            $_SESSION['admin_message'] = ['text' => 'Вы успешно авторизованы как администратор сайта', 'status' => 'text-success'];
            header("Location: main.php"); die();
        }else{
            $_SESSION['admin_message'] = ['text' => 'Неправильный пароль', 'status' => 'text-warning'];
//            return;
//            header("Location: index.php");
        }
    }else{
        $_SESSION['admin_message'] = ['text' => 'Неправильный логин или пароль', 'status' => 'text-danger'];
//        return;
//        header("Location: index.php");
    }
}elseif(!empty($_SESSION['admin_auth'])){
    header("Location: main.php");
}
//    require "elem/info.php";
    $content =
        '<form method="post">
             Введите логин:<br>
             <input type="text" name="login" id="" ><br>
             Введите пароль:<br>
             <input type="password" name="password" id=""><br><br>
             <input type="submit" name="send" value="Войти">
         </form>';

require "layout.php";