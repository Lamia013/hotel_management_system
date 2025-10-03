<?php
session_start();
include("../connect.php");
include("./login.php"); //for admin
    $email = "";
    $password = "";
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $login = new Login1();
        $result = $login->evaluate($_POST); //check
        if($result != "")
        {
            echo "<div style='text-align: center; font: size 13px; color: white; background-color: red;'>";
            echo $result;
            echo "</div>";
        }
        $email = $_POST['email'];
        $password = $_POST['password'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../image/l1.jpg" />
    <title>Midnights Hotel</title>
    <link rel="stylesheet" href="../css.css">
</head>
<body>
    <?php include("./nav0A.html"); ?>
    <form method="POST">
            <div id="box" style="height: 300px;">
            <h3>Admin Login Panel</h3>
            <input name="email" value="<?php echo $email ?>" type="text" id="id" placeholder="Email or Phone Number"> <br><br>
            <input name="password" type="password" id="id" placeholder="Password"> <br><br>
            <input type="submit" id="button" value="Log in"> 
        </div>
        </form>
        <br><br><br><br><br><br>
    <?php include("../nav.html"); ?>
</body>
</html>