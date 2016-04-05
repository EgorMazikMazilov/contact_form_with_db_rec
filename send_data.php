<?php

$link = mysqli_connect("localhost","admin","","user_dv")  or die("Не могу подключится !!");
mysqli_select_db($link,"user_dv");
if(isset($_POST['submit']))
{
    $errorMessage = "Что то пошло не так... скорее всего данные введены неверно";

    if(trim($_POST['fullName']) == '') {
            $hasError = true;
        } else {
        $firstname = trim(strip_tags($_POST['fullName']));
        }
    if(trim($_POST['gender']) == '0'){
        $hasError = true;
    }else{
        $gender = trim(strip_tags($_POST['gender']));
    }
       if(trim($_POST['phone']) == ''){
        $hasError = true;
    }else{
        $phone = trim(strip_tags($_POST['phone']));
    }

    // Проверка

    if(isset($hasError)) {
        echo "<p class='message'>" .$errorMessage. "</p>" ;
    }
    else{
        //Отправляем запрос в бд
        $insertToDb = "INSERT INTO `user_dv`.`user`
(`firstname`, `phone`, `gender`) VALUES ('$firstname', '$phone', '$gender')";
        mysqli_query($link,$insertToDb) or die(mysqli_error($link));
    }
}
