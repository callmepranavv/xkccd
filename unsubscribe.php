<?php
require 'configure.php';
$email=$_GET['email'];
echo "$email";

$sql="DELETE FROM `users` WHERE email ='$email'";
if ($con->query($sql) === TRUE) 
                {
                    echo "You are unsubscribed now";
                    
                  } else {
                    echo "Error: " . $sql . "<br>" . $con->error;
                  }
?>