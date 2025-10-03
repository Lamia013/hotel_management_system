<?php

class Login1
 {
    private $error = "";
 
    public function evaluate($data)
    {
        $email = $data['email'];
        $password = $data['password'];
        $query = "SELECT * FROM admin WHERE email = '$email' LIMIT 1";
         
         
        //return $query;
        
        // activating the DB
        $DB = new database();
        $result = $DB->read($query);

        if($result)
        {
            $row = $result[0];
            if($password == $row["password"])
            {
                $_SESSION['admin_userid'] = $row['id'];
                header("Location: ./a_dashbpard.php");
                die; 
            }
            else if($password != $row["password"])
            {
                $this->error .= "Wrong password.<br>";

            }
        }
        else
        {
            $this->error .= "No such email was found.<br>";

        }
        return $this->error;
    }

 }

?>