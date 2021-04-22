<?php
require 'init.php';
function getCategorySearch($link)
{
    $content = '';
    if (!isset($_GET['category']) ){
        $_SESSION['admin_message'] = ['text' => 'Page not found', 'status' => 'text-danger'];
        $title = 'Page not found';
        header("HTTP/1.0 404 Not found");
    }else{
        $categorySearch = $_GET['category'];
        $query = "SELECT COUNT(*) as count FROM anecdot WHERE category = '$categorySearch'";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        $count = mysqli_fetch_assoc($result)['count'];
        if (!isset($count)){
            $_SESSION['admin_message'] = ['text' => 'Page not found', 'status' => 'text-danger'];
            $title = 'Page not found';
            header("HTTP/1.0 404 Not found");
            }elseif(isset($count) && $count >= 1){
                $title = "$categorySearch";
                $query = "SELECT * FROM anecdot WHERE is_approved = true AND category = '$categorySearch'";
                $result = mysqli_query($link, $query) or die(mysqli_error($link));
                for ($data = []; $row = mysqli_fetch_assoc($result) ; $data[] = $row);
                foreach ($data as $item) {

                $content .="
<div class='container-fluid'>
    <div class='row' style='font-size: 13px; color: #2b9dba; font-style: italic'>
                        <div class='col-md-1' style='text-align: center;background-color: #cdd4a6; padding-top: 10px'>{$item['user_name']}
                        </div>
                        <div class='col-md-1' style='text-align: center;background-color: #cdd4a6; padding-top: 10px'>{$item['title']}</div>
                        <div class='col-md-1' style='text-align: center;background-color: #cdd4a6; padding-top: 10px'>{$item['category']}
                        </div>
                        <div class='col-md-3' style='text-align: center;background-color: #cdd4a6; padding-top: 10px'>{$item['date']}</div>
    </div>
             <div class='row' style='font-family: Cambria Regular'>
                 <div class='col-md-6' style='text-align: justify; background-color: #eab575;border-bottom: 1px dashed #665656; padding-top: 5px;padding-bottom: 10px'>{$item['text']}</div>
             </div>
</div>";
            }
        }elseif (isset($count) && $count < 1){
            $_SESSION['admin_message'] = ['text' => 'Анекдотов по этой категории еще нет', 'status' => 'text-primary'];
            $title = 'Page not found';
            header("HTTP/1.0 404 Not found");
        }
    }
    require "../admin/layout.php";
}
getCategorySearch($link);