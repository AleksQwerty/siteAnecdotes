<?php
require "init.php";
function getResultSearch($link)
{
    $title = 'Search';
    $search = $_GET['search'];
    $content = '';
    if (strlen($search) > 1){
        $query = "SELECT * FROM anecdot WHERE is_approved = true AND text LIKE '%$search%'";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        $notSearch = mysqli_fetch_assoc($result);
        $content .= "<b class='row'><div class='col-md-3 ' style='font-size: 20px'><b>Поисковой запрос: </b></div><div class='col-lg-1' style='text-align: right'>'{$search}'</div></div>";
    if (isset($notSearch)){
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
    }else{
        $_SESSION['admin_message'] = ['text' => 'Ничего не найдено', 'status' => 'text-danger'];
    }
    }else{
        $_SESSION['admin_message'] = ['text' => 'Поисковой запрос должен содержать не меньше одного символа', 'status' => 'text-danger'];
    }
    require "../admin/layout.php";
}
getResultSearch($link);