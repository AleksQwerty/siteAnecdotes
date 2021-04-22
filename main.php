<?php
require "elem/init.php";
$title = "Главная страница";
function getMainPage($link)
{
    if (isset($_GET['page'])){
        $page = $_GET['page'];
    }else{
        $page = 1;
    }
    $notesOnPage = 2;
    $from = ($page - 1) * $notesOnPage;
    $prevPage = $page - 1;
    if ($page == 1){
        $disabledPrev = " disabled";
    }else{
        $disabledPrev = '';
    }
    $content = "
                <div class='container-fluid'>
                     <div class='row'>
                        <div class='col-md-6''>";

    $content .= "
                    <nav aria-label=\"Page navigation example\">
                      <ul class=\"pagination justify-content-center\">
                        <li class=\"page-item$disabledPrev\">
                          <a class=\"page-link\" href=\"?page=$prevPage\" aria-label=\"Previous\">
                            <span aria-hidden=\"true\">&laquo;</span>
                            <span class=\"sr-only\">Previous</span>
                          </a>
                        </li>";
    $query = "SELECT COUNT(*) as count FROM anecdot WHERE `is_approved` = 1";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    $count = mysqli_fetch_assoc($result)['count'];
    $countPages = ceil($count / $notesOnPage);
    for ($i = 1; $i <= $countPages ; $i++) {
        if ($page == $i) {
            $style = " active";
        } else {
            $style = '';
        }
        $content .= "<li class=\"page-item$style\"><a class=\"page-link\" href=\"?page=$i\">$i</a></li>";
    }
    $nextPage = $page + 1;
    if ($page == $countPages){
        $disabledNext = " disabled";
    }else{
        $disabledNext = '';
    }
    $content .= "        <li class=\"page-item$disabledNext\">
                          <a class=\"page-link\" href=\"?page=$nextPage\" aria-label=\"Next\">
                            <span aria-hidden=\"true\">&raquo;</span>
                            <span class=\"sr-only\">Next</span>
                          </a>
                        </li>
                      </ul>
                    </nav>
                   </div>
                </div>";
    $content .= "<div class='row'>
                         <div class='col-md-6' style='text-align: center'><h3>Анекдоты</h3>
                         </div>
                 </div>";

    $query = "SELECT * FROM anecdot WHERE is_approved = true ORDER BY `date` DESC LIMIT $from, $notesOnPage";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    for ($data = []; $row = mysqli_fetch_assoc($result) ; $data[] = $row);
    foreach ($data as $item) {
        $content .=
            "<div class='row' style='font-size: 13px; color: #2b9dba; font-style: italic'>
                        <div class='col-md-1' style='text-align: center;background-color: #cdd4a6; padding-top: 10px'>{$item['user_name']}</div>
                        <div class='col-md-1' style='text-align: center;background-color: #cdd4a6; padding-top: 10px'>{$item['title']}</div>
                        <div class='col-md-1' style='text-align: center;background-color: #cdd4a6; padding-top: 10px'>{$item['category']}</div>
                        <div class='col-md-3' style='text-align: center;background-color: #cdd4a6; padding-top: 10px'>{$item['date']}</div>
             </div>
             <div class='row' style='font-family: Cambria Regular'>
                 <div class='col-md-6' style='text-align: justify; background-color: #eab575;border-bottom: 1px dashed #665656; padding-top: 5px;padding-bottom: 10px'>{$item['text']}
                 </div>
             </div>
             ";
    }
    $content .= "</div>";
    echo $content;
}

require 'templates/header.php';

getMainPage($link);

require 'templates/footer.php';