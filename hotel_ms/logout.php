<?php
session_start();
if(isset($_SESSION['hotel_userid']))
{
    $_SESSION['hotel_userid'] = NULL;
    unset($_SESSION['hotel_userid']);
}
header("Location: ./login.php");
die;
?>