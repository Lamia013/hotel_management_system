<?php
include("../connect.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') // Handle form submission to update the status
{
    $table_name = $_POST['table'];
    $room_id = (int)$_POST['room_id'];
    $action = $_POST['action'];
    $new_status = ($action === 'book') ? 1 : 0; // Determine the new status based on the action
    $query = "UPDATE $table_name SET status = '$new_status' WHERE room_no = '$room_id';";
    $DB = new database();
    $DB->write($query);
}
function table($table_name)
{
    $query = "SELECT * FROM " . $table_name . ";";
    $DB = new database();
    $result = $DB->read($query);
    if ($result && is_array($result)) 
    {
        $user_count = 0;
        $totalRows = count($result);
        while($user_count < $totalRows)
        {
            $row = $result[$user_count];
            echo "<tr><td>Room No: " . $row['room_no'] . "</td>";
            if($row["status"]==0)
            {
                $room_no = $row['room_no'];
                echo "<td><b>Status: Available</b></td>
                      <td>
                        <form method='POST'>
                            <input type='hidden' name='table' value='$table_name'>
                            <input type='hidden' name='room_id' value='$room_no'>
                            <input type='hidden' name='action' value='book'>
                            <button id='a' type='submit'>BOOK</button>
                        </form>
                      </td>";
            }
            else 
            {
                $room_no = $row['room_no'];
                echo "<td><b>Status: Unavailable</b></td>
                    <td>
                        <form method='POST'>
                            <input type='hidden' name='table' value='$table_name'>
                            <input type='hidden' name='room_id' value='$room_no'>
                            <input type='hidden' name='action' value='unbook'>
                            <button id='b' type='submit'>UNBOOK</button>
                        </form>
                    </td>";
            }
            echo "</tr>";  // Close the table row
            $user_count++;
        }
    }
}
?>