

<?php
require 'configure.php';
$id=$_GET['id'];


$sql="DELETE FROM `users` WHERE Id ='$Id'";
if ($con->query($sql) === TRUE) 
                {
                    echo "You are Undubdcribed now";
                    
                  } else {
                    echo "Error: " . $sql . "<br>" . $con->error;
                  }
?>
