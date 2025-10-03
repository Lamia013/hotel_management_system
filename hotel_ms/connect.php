<?php
class database
{
    private $host = "localhost";
    private $username = "root";
    private $password = "";  
    private $db = "hotel_management_systemdb";

    function connectdb()
    {
        $connection = mysqli_connect($this->host, $this->username, $this->password, $this->db);  
        return $connection;
    }
    function read($query)
    {
        $conn = $this->connectdb();
        $result = mysqli_query($conn, $query);
        if(!$result)
        {
            return false;
        }
        else
        {
            $data = false;
            while($row = mysqli_fetch_assoc($result))
            {
                $data[] = $row;
            }
            return $data; 
        }
    }
    function write($query)
    {
        $conn = $this->connectdb();
        $result = mysqli_query($conn, $query);
        if(!$result)
        {
            return false;
        }
        else
        {
            return true;
        }
    }
}
?>


<?php
  //works read
  //$query = "Select price from single_ac";
  //$DB = new database();
   //$result = $DB->read($query);
   //print_r($result);

   //$r = $result[0];

   //echo "Price: " . $r['price'];

?>                                 
<?php
//write
   //include("../connect.php");
   //$query = "INSERT INTO single_non_ac (holder_name, holder_mobile, holder_address, child, adult, in_date, out_date, status) 
               //VALUES 
               //('kim', '3333444', 'usa', '', '1', '', '', '1')";
   //$DB = new database();
   //$result = $DB->write($query);
  
?> 
<?php
//both write and read
   //include("../connect.php");
   //$query = "INSERT INTO single_non_ac (holder_name, holder_mobile, holder_address, child, adult, in_date, out_date, status) 
               //VALUES 
               //('kim', '3333444', 'usa', '', '1', '', '', '1')";
   //$DB = new database();
   //$result = $DB->write($query);
   //print_r($result);
   

   //$query1 = "Select * from single_non_ac";
   //$DB = new database();
   //$result1 = $DB->read($query1);

   //echo "<pre>";
   //print_r($result1);
   //echo "</pre>";
?>                                 