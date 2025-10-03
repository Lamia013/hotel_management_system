<?php
session_start();
if(!(isset($_SESSION["admin_userid"]))) 
{
    // Redirect to login if the admin is not logged in
    header("Location: ./admin.php");
    die;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css.css">

</head>
<body>
    <?php include("./nav0A.html"); ?>
    
    <div id="header-wrapper">
        <br><br><br>
        <div class="row">
            <a class="btn-room" href="./rooms.php">Book Room</a>
            <a class="btn-room" href="./rooms.php">Check Room Status</a>
            <a class="btn-room" href="./checkedin.php">View Users Detail</a>
        </div><br>
    </div>
    <div class="dashboard">
       	<center><h3 id="h3">Room Booked Users Details</h3></center>
           <center><table class="table">
                <thead>
                <tr  style="background-color: wheat;">
                    <th class="t-row">S.No</th>
                    <th class="t-row">User Name</th>
                    <th class="t-row">User Mobile</th>
                    <th class="t-row">Room No</th>
                    <th class="t-row">User Address</th>
                    <th class="t-row">Check-In</th>
                    <th class="t-row">Check-Out</th>
                </tr> 
                </thead>                
        		<?php 
                    include("../connect.php");
                    $query = "
                                SELECT * FROM single_non_ac WHERE status = 1
                                UNION 
                                SELECT * FROM double_non_ac WHERE status = 1
                                UNION 
                                SELECT * FROM single_ac WHERE status = 1
                                UNION 
                                SELECT * FROM double_ac WHERE status = 1";
                    // activating the DB
                    $DB = new database();
                    $result = $DB->read($query); //returns an array of rows

                    if ($result && is_array($result)) 
                    {
                        $user_count = 0;
                        $totalRows = count($result);
                        
                        // Use while loop to iterate over result
                        while ($user_count < $totalRows) 
                        {
                            $user_count++;
                            $row = $result[$user_count - 1]
                        ?> <!-- ending to use html tag -->
                        <tr>
                        <td class="t-row"><?php echo "$user_count";?></td>
                                <td class="t-row"><?php echo $row['holder_name'];?></td>
                                <td class="t-row"><?php echo $row['holder_mobile'];?></td>
                                <td class="t-row"><?php echo $row['room_no'];?></td>
                                <td class="t-row"><?php echo $row['holder_address'];?></td>
                                <td class="t-row"><?php echo $row['in_date'];?></td>
                                <td class="t-row"><?php echo $row['out_date'];?></td>
                            </tr>
                            <!-- starting to end while loop -->
                            <?php
                            
                        }
                    } 
                    else 
                    {
                        echo "No records found with logged in users.";
                    }
                    
                ?>
            </table>
            </center>
    </div>
        
        <br><br><br><br><br><br>

    <?php include("../nav.html"); ?>

</body>
</html>