<?php
session_start();
include("./connect.php");
class Signup
{
    private $error = "";
    public function evaluate($data, $table_name, $room_price)
    {
        $current_date = date("Y-m-d");
        if(strtotime($data['in_date']) < strtotime($current_date)) 
        {
            $this->error .= "Check-in date cannot be in the past!<br>";
        }
        if(strtotime($data['out_date']) < strtotime($current_date)) 
        {
            $this->error .= "Check-out date cannot be in the past!<br>";
        }
        if(strtotime($data['out_date']) <= strtotime($data['in_date'])) 
        {
            $this->error .= "Check-out date must be later than the check-in date!<br>";
        }
        foreach($data as $key => $value) 
        {
            if(empty($value)) 
            {
                $this->error = $this->error . $key . " is empty!<br>";
            }
        }
        if ($this->error == "") 
        {
            $this->create_user($data, $table_name, $room_price);
        } 
        else 
        {
            return $this->error;
        }
    }
    public function create_user($data, $table_name, $room_price)
    {
        $holder_id = $_SESSION["hotel_userid"];
        $first_name = ucfirst($data['first_name']);
        $last_name = ucfirst($data['last_name']);
        $holder_mobile = $data['holder_mobile'];
        $holder_email = $data['holder_email'];  
        $holder_address = $data['holder_address'];
        $in_date = $data['in_date'];
        $out_date = $data['out_date'];
        $query = "insert into $table_name (
        holder_name, holder_id, holder_email, holder_mobile, holder_address,in_date, out_date, status, price) 
        values 
        ('$first_name $last_name', '$holder_id','$holder_email', '$holder_mobile','$holder_address', '$in_date', '$out_date', '1', '$room_price')";
        $DB = new database();
        $result = $DB->write($query);
        $_SESSION['booking_data'] = [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $holder_email,
            'mobile' => $holder_mobile,
            'address' => $holder_address,
            'in_date' => $in_date,
            'out_date' => $out_date,
            'room_price' => $room_price,
        ];
    }
}
if (isset($_GET["price"])) 
{
    $p = $_GET["price"];
    $t = $_GET["table_name"];
} else 
{
    echo "Price or Table name not specified.";
    exit;
}// Initialize variables with session data if available
$first_name = isset($_SESSION['first_name']) ? $_SESSION['first_name'] : "";
$last_name = isset($_SESSION['last_name']) ? $_SESSION['last_name'] : "";
$holder_mobile = isset($_SESSION['holder_mobile']) ? $_SESSION['holder_mobile'] : "";
$email = isset($_SESSION['holder_email']) ? $_SESSION['holder_email'] : "";
$holder_address = isset($_SESSION['holder_address']) ? $_SESSION['holder_address'] : "";
$in_date = isset($_SESSION['in_date']) ? $_SESSION['in_date'] : "";
$out_date = isset($_SESSION['out_date']) ? $_SESSION['out_date'] : "";
if(!(isset($_SESSION["hotel_userid"]))) 
{
    // Redirect to login if the user is not logged in
    header("Location: ./login.php");
    die;
}
if(isset($_SESSION["hotel_userid"]))
{
    $id = $_SESSION['hotel_userid'];
    $q = "SELECT * FROM $t WHERE holder_id =$id AND status='1'";
    $DB = new database();
    $r = $DB->read($q);
    if($r)
    {
        echo "You have already made a booking for this room.";
        
        die;
    }
}
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Store form data in session
    $_SESSION['first_name'] = $_POST['first_name'];
    $_SESSION['last_name'] = $_POST['last_name'];
    $_SESSION['holder_mobile'] = $_POST['holder_mobile'];
    $_SESSION['holder_email'] = $_POST['holder_email'];
    $_SESSION['holder_address'] = $_POST['holder_address'];
    $_SESSION['in_date'] = $_POST['in_date'];
    $_SESSION['out_date'] = $_POST['out_date'];
    $signup = new Signup();
    $result = $signup->evaluate($_POST, $t, $p);
    if ($result != "") 
    {
        echo "<div style='text-align: center; font: size 13px; color: white; background-color: red;'>";
        echo $result;
        echo "</div>";
    } 
    else 
    {
        header("Location: ./confirmation.php?price=$p&table_name=$t");  // Redirect to confirmation page
        die;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel | Bill</title>
    <link rel="stylesheet" href="./css.css">

    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f9;
}
.container {
    width: 80%;
    margin: 20px auto;
    padding: 20px;
    background: #ffffff;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}
h1, h2 {
    color: #333;
}
form {
    display: flex;
    flex-direction: column;
}
.section {
    margin-bottom: 20px;
}
label {
    display: block;
    margin: 10px 0 5px;
    color: #555;
}
input, textarea, select {
    width: 80%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 1rem;
}
table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}
table th, table td {
    border: 1px solid #ccc;
    padding: 10px;
    text-align: left;
}
button {
    padding: 10px 20px;
    background-color: #5cb85c;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 22px;
}
button:hover {
    background-color: #4cae4c;
}
#yes {
    text-align: center;
}
.error-message {
    color: red;
    font-weight: bold;
}
</style>
</head>
<body>
    <?php include("./nav0.html"); ?> <br>
    <div class="container">
        <h1>Bill</h1>
        <!-- Customer Details -->
        <div class="section">
            <h2>Customer Details</h2>
            <form method="post" action="">
                <label for="name">Name:</label>
                <input value="<?php echo $first_name ?>" name="first_name" type="text" id="id" placeholder="First Name"><br><br>
                <input value="<?php echo $last_name ?>" name="last_name" type="text" id="id" placeholder="Last Name"><br><br>
                <label for="holder_mobile">Phone Number:</label>
                <input value="<?php echo $holder_mobile ?>" name="holder_mobile" id="id" placeholder="Phone Number"><br><br>
                <label for="email">Email Address:</label>
                <input value="<?php echo $email ?>" name="holder_email" type="text" id="id" placeholder="Email"> <br><br>
                <label for="holder_address">Home Address:</label>
                <input value="<?php echo $holder_address ?>" name="holder_address" placeholder="Address"> <br><br>
        </div>
        <!-- Billing Details -->
        <div class="section">
            <h2>Billing Information</h2>
            <label for="payment">Payment Method:</label>
            <select id="payment" name="payment" required aria-label="Payment Method">
                <option value="">Select Payment Method</option>
                <option value="credit-card">Credit Card</option>
                <option value="debit-card">Debit Card</option>
                <option value="paypal">PayPal</option>
                <option value="cash">Cash</option>
            </select>
        </div>
        <!-- Itemized Billing -->
        <div class="section">
            <h2>Details</h2>
            <table>
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Price</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Room Rent</td>
                        <td><?php echo isset($_GET["price"]) ? "$" . $_GET["price"] : "Not available"; ?></td>
                        <td>
                            Check-in date: <br>
                            <input type="date" id="in_date" name="in_date"><br><br>
                            Check-out date: <br>
                            <input type="date" id="out_date" name="out_date"><br><br>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <button type="submit" action = "./confirmation.php">Confirm Payment</button>
        </form>
    </div><br>
    <?php include("./nav.html"); ?>
</body>
</html>
