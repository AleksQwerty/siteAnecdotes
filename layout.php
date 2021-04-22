<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
require 'elem/form.php';
$title = 'Предложить анедкот';
require 'templates/header.php'
?>
<div class="container mt-4">
    <div class="row">
        <?php require "elem/info.php";?>
    </div>
    <div class="row">
        <div><h1>Предложите свой анекдот</h1></div>
    </div>
    <form action="" method="post">
        <div class="row">
            <input type="text" name="user_name" id="" class="form-control col-md-6" placeholder="Введите ваше имя" value="<?=$user_name ?? ''?>">
        </div>
        <br>
        <div class="row">
            <input type="text" name="title" id="" class="form-control col-md-6" placeholder="Введите заголовок" value="<?=$titleAnecdot ?? ''?>">
        </div>
        <br>
        <div class="row" style="margin-bottom: 10px">
            <textarea name="text" id="" cols="30" rows="10" class="form-control col-md-6" placeholder="Ваш анекдот" ><?=$textAnecdot ?? ''?></textarea>
        </div>
        <div class="row">
            <div class="form-group" name="category">
<!--                <label for="exampleFormControlSelect1"></label>-->
                <h5>Выберите категорию</h5>
                <select class="form-control" id="exampleFormControlSelect1" name="category">
                    <option value="Women">Про женщин</option>
                    <option value="Men">Про мужчин</option>
                    <option value="Sport">Про спорт</option>
                    <option value="Russia">Про Россию</option>
                    <option value="Politics">Про политику</option>
                </select>
            </div>
        </div>
        <br>
        <div class="row">
        <button type="submit" name="send" class="btn" style="background-color: #1d6879; color: rgb(234,234,239)">Предложить анекдот</button>
        </div>
    </form>
</div>
<!--<main>-->
<!--    <div class="container-fluid">-->
<!--        <h1>Сайт анекдотов</h1>-->
<!--        <div class="row">-->
<!--            <div class="col-xs-12 col-sm-9 col-md-4 col-lg-6" style="background-color: #a8e345">Про города</div>-->
<!--            <div class="col-xs-12 col-sm-3 col-md-8 col-lg-6" style="background-color: #53a6e7">Про Россию</div>-->
<!--        </div>-->
<!--    </div>-->
<!--</main>-->
<?php require 'templates/footer.php';?>
