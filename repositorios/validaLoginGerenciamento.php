<?php
session_start();

if(!isset($_SESSION['user'])&& !isset($_SESSION['id'])){

    header("location:login.php");
}else
    if($_SESSION['user']!='adm'){
        header("location:login.php");
    }