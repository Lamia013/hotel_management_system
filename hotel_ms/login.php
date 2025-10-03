<?php
session_start();
include("./connect.php");
include("./class/login2.php"); 
    $email = "";
    $password = "";
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $login = new Login();
        $result = $login->evaluate($_POST); //check
        if($result != "")
        {
            echo "<div style='text-align: center; font: size 13px; color: white; background-color: red;'>";
            echo $result;
            echo "</div>";
        }
        else
        {
            header("Location: ./index.php");
            die;        //end here; ensures clean break
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
    <link rel="stylesheet" href="./css.css">
    <title>Hotel | Log in</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }   

        body {
            margin: 0;
            padding: 0;
            background-color: #3f778c;
        }
    </style>
</head>
<body style="background-color: #3f778c;">
    <?php include("./nav0.html"); ?>
    <div id="name">
        <a href="/hotel_ms/signup.php">
            <div id="signup">Signup</div>
        </a>
        <br>
    </div>
    <form method="post">
        <div id="box" style="height: 300px;">
            Log in to Hotel <br><br>
            <input name="email" value="<?php echo $email ?>" type="text" id="id" placeholder="Email or Phone Number"> <br><br>
            <input name="password" type="password" id="id" placeholder="Password"> <br><br>
            <input type="submit" id="button" value="Log in"> 
        </div>
    </form>
    <br><br><br>
    <?php include("./nav.html"); ?>
</body>
</html>