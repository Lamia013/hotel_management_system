<?php
class Signup
 {
     private $error = "";
     public function evaluate($data)
     {
         foreach ($data as $key => $value)
         {
             if(empty($value))
             {
                 $this->error = $this->error . $key . " is empty!<br>";
             }
             if($key == "email")
             {
                if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $value))
                {
                    $this->error = $this->error . $key . " invalid email address!<br>";
                }
             }
             if($key == "first_name")
             {
                if(is_numeric($value))
                {
                    $this->error = $this->error . $key . " First Name can't be a number.<br>";
                }
                if(strstr($value, " "))
                {
                    $this->error = $this->error . $key . " First Name can't have spaces.<br>";
                }
             }
             if($key == "last_name")
             {
                if(is_numeric($value))
                {
                    $this->error = $this->error . $key . " Last Name can't be a number.<br>";
                }
                if(strstr($value, " "))
                {
                    $this->error = $this->error . $key . " Last Name can't have spaces.<br>";
                }
             }
         }
         if($this->error == "")  //no error
         {
             $this->create_user($data);
         }
         else
         {
             return $this->error;
         }
     }
     public function create_user($data)
     {
         $first_name = ucfirst($data['first_name']);
         $last_name = ucfirst($data['last_name']);
         $gender = $data['gender'];
         $email = addslashes($data['email']);
         $phone = $data['phone'];
         $password = addslashes($data['password']);
         $user_id = $this->create_userid();
         $query = "insert into users (user_id, first_name, last_name, gender, phone, email, password) 
                    values ('$user_id','$first_name', '$last_name', '$gender','$phone', '$email', '$password')";
         $DB = new database();
         $DB->write($query);
     }
     private function create_userid()
     {
         $length = rand(4,19);
         $number = "";
         for($i = 0; $i < $length; $i++)
         {
             $new_rand = rand(0,9);
             $number = $number . $new_rand;
         }
         return $number;
     }
 }
?>