<?php
    include("./connect.php");
    include("./class/signup2.php");       
    $first_name = "";
    $last_name = "";
    $gender = "";
    $email = "";
    $phone = "";
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $signup = new Signup();
        $result = $signup->evaluate($_POST);
        if($result != "")
        {
            echo "<div style='text-align: center; font: size 13px; color: white; background-color: red;'>";
            echo $result;
            echo "</div>";
        }
        else//redirecting
        {
            header("Location: ./login.php");
            die;        //end here; ensures clean break
        } 
        $first_name = $_POST['first_name'];  //UPDATES THE VALUES
        $last_name = $_POST['last_name'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css.css">
    <title>Hotel | Sign up</title>
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
<body style="background-color:#3f778c;">
    <?php include("./nav0.html"); ?>
    <div id="name">
        <a href="./login.php">
            <div id="signup">Login</div>        
        </a>
    </div>
    <br><br><br>
    <div id="box">
        Sign up to Hotel <br><br>
        <form method="post" action="./signup.php">
            <input value="<?php echo $first_name ?>" name="first_name" type="text" id="id" placeholder="First Name"> <br><br>
            <input value="<?php echo $last_name ?>"name="last_name" type="text" id="id" placeholder="Last Name"> <br> <br>
            Gender: 
            <select name="gender" id="id" style="width: 220px;">
                <option><?php echo $gender ?></option>
                <option>Male</option>
                <option>Female</option>
            </select> <br><br> 
            <input value="<?php echo $email ?>"name="email" type="text" id="id" placeholder="Email"> <br><br>
            <input value="<?php echo $phone ?>"name="phone" type="text" id="id" placeholder="Phone Number"> <br><br>
            <input name="password" type="password" id="id" placeholder="Password"> <br><br>
            <input name="password2" type="password" id="id" placeholder="Re-type Password"> <br><br>
            <input type="submit" id="button" value="Sign up"> 
            <br><br><br>
        </form>
    </div>
    <br><br><br>
    <?php include("./nav.html"); ?>
</body>
</html>