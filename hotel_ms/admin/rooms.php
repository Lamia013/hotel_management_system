<?php include("../class/room2.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Booking Page</title>
    <link rel="stylesheet" href="../css.css">
</head>
<body>
    <?php include("./nav0A.html"); //as it's in folder cna't go to admin login ?>
    <div><br>
        <center><h2>Room Booking Page</h2></center>
        <center><h3 id="h3">Room Type:-  Single Ac Rooms</h3></center><br>
        <table>
            <tr>
            <th>Room Details</th>;
            </tr>
            <?php table("single_ac");?>
        </table>
    </div>
    <div><br>
        <center><h3 id="h3">Room Type:-  Single Non Ac Rooms</h3></center><br>
        <table>
            <tr>
            <th>Room Details</th>;
            </tr>
            <?php table("single_non_ac");?>
        </table>
    </div>
    <div><br>
        <center><h3 id="h3">Room Type:-  Double Ac Rooms</h3></center><br>
        <table>
            <tr>
            <th>Room Details</th>;
            </tr>
            <?php table("double_ac");?>
        </table>
    </div>
    <div><br>
        <center><h3 id="h3">Room Type:-  Double Non Ac Rooms</h3></center><br>
        <table>
            <tr>
            <th>Room Details</th>;
            </tr>
            <?php table("double_non_ac");?>
        </table>
    </div><br><br><br><br><br>
    <?php include("../nav.html"); ?>
</body>
</html>