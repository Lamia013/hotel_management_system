<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css.css">
</head>
<body>
<?php include("../admin/nav0A.html"); ?>
<div class="dashboard">
<br><br>
       	<center><h3>All Booked-in Users Details</h3></center>
           <table class="table">
                <thead>
                <tr>
                    <th class="t-row">S.No</th>
                    <th class="t-row">User Name</th>
                    <th class="t-row">User ID</th>
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
                SELECT * FROM single_non_ac WHERE out_date != ''
                UNION
                SELECT * FROM double_non_ac WHERE out_date != ''
                UNION 
                SELECT * FROM single_ac WHERE out_date != ''
                UNION 
                SELECT * FROM double_ac WHERE out_date != '' 
            ";// activating the DB
    $DB = new database();
    $result = $DB->read($query); //returns an array of rows
    if ($result && is_array($result)) 
    {
        $user_count = 0;
        $totalRows = count($result);// Use while loop to iterate over result
        while ($user_count < $totalRows) 
        {
            $user_count++;
            $row = $result[$user_count - 1]
?>
                <tr><br>
                    <td class="t-row"><?php echo "$user_count";?></td>
                    <td class="t-row"><?php echo $row['holder_name'];?></td>
                    <td class="t-row"><?php echo $row['holder_id'];?></td>
                    <td class="t-row"><?php echo $row['holder_mobile'];?></td>
                    <td class="t-row"><?php echo $row['room_no'];?></td>
                    <td class="t-row"><?php echo $row['holder_address'];?></td>
                    <td class="t-row"><?php echo $row['in_date'];?></td>
                <td class="t-row"><?php echo $row['out_date'];?></td>
                </tr><!-- starting to end while loop -->                                                      
<?php
                        }
    } 
    else 
   {
        echo "No records found with logged in users.";
   }
?>
</table>
    </div>
        <br><br><br><br><br><br>
    <?php include("../nav.html"); ?>
</body>
</html>