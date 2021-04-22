<?php
require "../elem/init.php";
function getTableWithAnecdotes($link)
{
    if (!empty($_SESSION['admin_auth'])){
        $title = "Страница администратора";
        $content = "<table class='table  table-sm table-bordered table-light'>

                <th class=\"table-dark\">User</th>
                <th class=\"table-dark\">Title</th>
                <th class=\"table-dark\">anecdotText</th>
                <th class=\"table-dark\">Category</th>
                <th class=\"table-dark\">DateAnecdot</th>
                <th class=\"table-dark\">isAdded</th>
                <th class=\"table-dark\">addAnecdot</th>
                <th class=\"table-dark\">delAnecdot</th>
";
        $query = "SELECT * FROM anecdot ORDER BY `date` DESC";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        for ($data = []; $row = mysqli_fetch_assoc($result) ; $data[] = $row);
        foreach ($data as $item) {
            $content .= "<tr class='table-primary'>
                     <td>{$item['user_name']}</td>
                     <td>{$item['title']}</td>
                     <td style='text-align: center'>{$item['text']}</td>
                     <td>{$item['category']}</td>
                     <td style='text-align: center'>{$item['date']}</td>
                     <td style='text-align: center'>{$item['is_approved']}</td>
                     <td><a href=\"?add={$item['id']}\">Добавить</a></td>
                     <td><a href=\"?del={$item['id']}\">Удалить</a></td>
                     </tr>";
        }
        $content .= "</table>";
    }else{
        header("Location: index.php");
    }

    require "layout.php";
}

function delAnecdot($link)
{
    if (isset($_GET['del'])){
        $del = $_GET['del'];
        $query = "DELETE FROM anecdot WHERE id = '$del'";
        mysqli_query($link, $query) or die(mysqli_error($link));
        $_SESSION['admin_message'] = ['text' => 'Анекдот успешно удалён', 'status' => 'text-success'];
    }
}
function addAnecdot($link)
{
    if (isset($_GET['add'])){
        $add = $_GET['add'];
        $query = "UPDATE anecdot SET is_approved = true WHERE id = '$add'";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        $query = "SELECT user_name as user FROM anecdot WHERE id = '$add' AND is_approved = true";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        $user = mysqli_fetch_assoc($result)['user'];
        $_SESSION['admin_message'] = ['text' => "Анекдот от пользователя \"$user\" добавлен на главную страницу сайта", 'status' => 'text-success'];
    }
}
delAnecdot($link);
addAnecdot($link);
getTableWithAnecdotes($link);