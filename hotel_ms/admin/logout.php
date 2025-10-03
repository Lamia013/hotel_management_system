<?php
session_start();
if(isset($_SESSION['admin_userid']))
{
    $_SESSION['admin_userid'] = NULL;
    unset($_SESSION['admin_userid']);
}
header("Location: ./admin.php");
die;
?>