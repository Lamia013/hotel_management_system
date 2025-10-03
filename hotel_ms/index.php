<?php   
    session_start();    
    include("./connect.php");
    include("./class/login2.php");
    include("./user.php");   
    function check_room_availability($table_name) 
    {
        // Check the number of rooms with status = 1 in the database
        $query = "SELECT COUNT(*) FROM $table_name WHERE status = 1";
        $DB = new database();
        $result = $DB->read($query);        
        // Assuming there is only one row returned
        $count = $result[0]['COUNT(*)'];        
        // If the count is 5 or more, return false (indicating no rooms available)
        if ($count >= 5) {
            return false;  // No more available rooms
        }
        return true;  // Rooms are available
    }
    function getdata11($t)
    {
        $query = "Select * from $t limit 1";
        $DB = new database();
        $result = $DB->read($query);
        $r = $result[0];
        echo "Price: " . $r['price'] . "/day";
        return $r['price'];
    }
    //check if logged in
    if(isset($_SESSION["hotel_userid"]) && is_numeric($_SESSION["hotel_userid"]))
    {
        $id = $_SESSION['hotel_userid'];
        $login = new Login();
        $result = $login->check_login($id);
        if($result)
        {
            $user = new User();
            $user_data = $user -> get_data($id);
            if(!$user_data)
            {
                header("Location: ./login.php");
                die;
            }            
        }
        else
        {
            header("Location: ./login.php");
            die;        //end here; ensures clean break
        }
    }   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css.css" />

    <title>Midnights Hotel</title>
</head>
<body style="background-color: #3f778c; margin: 0;">
    <?php include("./nav0.html"); ?>
    <div id="img">
        <div class="bg-text" style="text-align: center">
            <h4>Away from monotonous life</h4>
            <h2>Relax Your Mind</h2>
            <p>
            Experience tranquility away from your busy life. Our hotel offers a perfect getaway to relax your mind and rejuvenate.
            </p>
            <a href="./login.php"> 
                <input type="submit" class="button" value="GET STARTED" />
            </a>
        </div>
    </div>
    <div id="book">
        <h2>BOOK<br />YOUR ROOM</h2>
        <div>
            <a href="#room"> <input type="submit" class="button" id="b1" value="BOOK NOW" /> </a>
        </div>
    </div>
    <!--================ Room Area  =================-->
    <div style="padding: 8px" id="room">
        <h2>Rooms</h2>
        <p>
        Explore our comfortable rooms and choose the one that suits your needs. Whether you prefer a Single Non-AC Room or a Double AC Room, we’ve got you covered.
        </p>
        <div id="packs">
            <div class="room">
                <img src="./image/r1.jpeg" alt="room1" style="width:270px;height:270px;"/>
                <div id="price">
                    <b style="font-size: 20px">Single Non-AC Room</b> <br />
                    <?php 
                    $data1 = getdata11('single_non_ac'); 
                    $t = 'single_non_ac';
                    if (check_room_availability($t))
                    {
                        echo "<a href = './b1.php?price=$data1&table_name=$t'>
                        <button class='room-btn'>BOOK NOW</button>
                        </a>";
                    }
                    ?>
                </div>
            </div>
            <div class="room">
                <img src="./image/r3.jpeg" alt="room2" style="width:270px;height:270px;"/>
                
                <div id="price">
                    <b style="font-size: 20px">Single AC Room</b> <br />
                    <?php 
                    $data1 = getdata11('single_ac'); 
                    $t = 'single_ac';
                    if (check_room_availability($t))
                    {
                        echo "<a href = './b1.php?price=$data1&table_name=$t'>
                        <button class='room-btn'>BOOK NOW</button>
                        </a>";
                        }
                    ?>
                </div>
            </div>
            <div class="room">
                <img src="./image/room1.jpg" alt="room3" />                
                <div id="price">
                    <b style="font-size: 20px">Double Non-AC Room</b> <br />
                    <?php 
                    $data1 = getdata11('double_non_ac'); 
                    $t = 'double_non_ac';
                    if (check_room_availability($t))
                    {
                        echo "<a href = './b1.php?price=$data1&table_name=$t'>
                        <button class='room-btn'>BOOK NOW</button>
                        </a>";
                    }
                    ?>                
                </div>
            </div>
            <div class="room">
                <img src="./image/room2.jpg" alt="room4" />                
                <div id="price">
                    <b style="font-size: 20px">Double AC Room</b> <br />
                    <?php 
                    $data1 = getdata11('double_ac'); 
                    $t = 'double_ac';
                    if (check_room_availability($t))
                    {
                        echo "<a href = './b1.php?price=$data1&table_name=$t'>
                        <button class='room-btn'>BOOK NOW</button>
                        </a>";
                    }
                    ?>                
                </div>
            </div>
        </div>
    </div>
    <!--================ Facilities Area  =================-->
    <div id="facility">
        <h2>Facilities</h2>
        <p>At Midnights Hotel, we provide a range of facilities to make your stay memorable:</p>
        <div class="facility-container">
            <div class="facility-box">
                <h4>Restaurant</h4>
                <p>
                Savor delicious meals prepared by our expert chefs.
                </p>
            </div>
            <div class="facility-box">
                <h4>Sports Club</h4>
                <p>
                Stay active and have fun.
                </p>
            </div>
            <div class="facility-box">
                <h4>Swimming Pool</h4>
                <p>
                Take a refreshing dip and unwind.
                </p>
            </div>
            <div class="facility-box">
                <h4>Rent a Car</h4>
                <p>
                Explore the city with ease.
                </p>
            </div>
            <div class="facility-box">
                <h4>Gymnasium</h4>
                <p>
                Keep up with your fitness routine.
                </p>
            </div>
            <div class="facility-box">
                <h4>Bar</h4>
                <p>
                Relax with a drink in hand.
                </p>
            </div>
        </div>
        <p>
            Book your room today and make the most of your stay with us!
        </p>
    </div>   
    <?php include("./nav.html"); ?>
</body>
</html>