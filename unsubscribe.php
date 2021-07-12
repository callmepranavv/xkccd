

<?php
require 'configure.php';
$email=$_GET['email'];


$sql="DELETE FROM `users` WHERE email ='$email'";
if ($con->query($sql) === TRUE) 
                {
                    echo "You are Undubdcribed now";
                    
                  } else {
                    echo "Error: " . $sql . "<br>" . $con->error;
                  }
?>
