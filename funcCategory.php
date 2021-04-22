<?php
function getCategory()
{
    echo "<form class=\"form-inline my-2 my-lg-0\" action=\"/elem/category.php\">
<button class=\"btn btn-outline-secondary text-light my-2 my-sm-0\" type=\"submit\">Поиск по категориям</button>
        <select class=\"form-control\" id=\"exampleFormControlSelect1\" name=\"category\">
                    <option value=\"Women\">Про женщин</option>
                    <option value=\"Men\">Про мужчин</option>
                    <option value=\"Sport\">Про спорт</option>
                    <option value=\"Russia\">Про Россию</option>
                    <option value=\"Politics\">Про политику</option>
                </select>
        </li>
</form>";
}
getCategory();
