<?php
session_start();
if(!isset($_SESSION['booking_data'])) 
{// Redirect if no booking data is found
    header("Location: ./index.php");
    exit;
}
$booking_data = $_SESSION['booking_data'];
if(isset($_GET["price"])) 
{
    $p = $_GET["price"];
    $t = $_GET["table_name"];
} 
else 
{
    echo "Price or Table name not specified.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Confirmation</title>
    <style>
        .container{
            text-align: center;}
        button{
            background-color: blue;}
        .section{
            text-align: left;
            font-size: medium;}
    </style>
</head>
<body>
    <div class="container">
        <h1>Booking Confirmation</h1>
        <p>Your booking has been successfully processed. Below are the details of your booking:</p>
        <div class="section">
            <h2>Customer Details</h2>
            <p><strong>Name:</strong> <?php echo $booking_data['first_name'] . " " . $booking_data['last_name']; ?></p>
            <p><strong>Email:</strong> <?php echo $booking_data['email']; ?></p>
            <p><strong>Phone Number:</strong> <?php echo $booking_data['mobile']; ?></p>
            <p><strong>Address:</strong> <?php echo $booking_data['address']; ?></p>
        </div>
        <div class="section">
            <h2>Booking Details</h2>
            <p><strong>Check-in Date:</strong> <?php echo $booking_data['in_date']; ?></p>
            <p><strong>Check-out Date:</strong> <?php echo $booking_data['out_date']; ?></p>
            <p><strong>Room Type:</strong> <?php echo $t; ?></p>
            <p><strong>Room Price:</strong> $<?php echo $p; ?></p>
        </div>
        <div class="section">
            <p>Thank you for choosing our services. We hope you enjoy your stay!</p>
            <a href="./index.php">
                <?php
                session_unset();
                session_destroy();
                ?>
                <button>Return to Homepage</button>
            </a>
        </div>
    </div>
</body>
</html>
