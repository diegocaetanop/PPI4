<?php
session_start();

if(!isset($_SESSION['user'])&& !isset($_SESSION['id'])){

    header("location:login.php");
}else
    if($_SESSION['user']!='user'){
        header("location:login.php");
    }