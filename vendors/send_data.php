<?php

$link = mysqli_connect("localhost","admin","","user_dv")  or die("Не могу подключится !!");
mysqli_select_db($link,"user_dv");
if(isset($_POST['submit']))
{
    $errorMessage = "";
    
    if(trim($_POST['firstname']) == '') {
            $hasError = true;
        } else {
        $firstname = trim(strip_tags($_POST['firstname']));
        }
    if(trim($_POST['gender']) == ''){
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
header("Location: ../all_ok.html");
exit();
