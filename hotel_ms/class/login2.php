<?php
class Login
 {
    private $error = "";
    public function evaluate($data)
    {
        $email = $data['email'];
        $password = $data['password'];
        $query = "SELECT * FROM users WHERE email = '$email' LIMIT 1";      
        $DB = new database();       // activating the DB
        $result = $DB->read($query);

        if($result)
        {
            $row = $result[0];
            if($password == $row["password"])
            {//create session data; global variable
                $_SESSION['hotel_userid'] = $row['user_id'];     //assigns a session when first enter, so next time enter still knows that it's you// it'll expire
            }
            else
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
    public function check_login($id)
    {
        $query = "SELECT user_id FROM users WHERE user_id = '$id' LIMIT 1";
        $DB = new database();       // activating the DB
        $result = $DB->read($query);
        if($result)
        {
            return true;
        }
        return false; //no user means
    }
 }
?>