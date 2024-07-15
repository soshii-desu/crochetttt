<?php


session_start();
if(!isset($_SESSION['USER'])) {
    header ("Location: ". "../login.php");
}
else{
    if($_SESSION['USER']['Role']== "Admin")
    {

    }
    elseif($_SESSION['USER']['Role']== "User"){
        header ("Location: ". "../customer/Home.php");
    }
}
?>