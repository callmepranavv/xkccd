

<?php
require 'configure.php';
$userid=$_GET['userid'];


$sql="DELETE FROM `users` WHERE Id ='$userid'";
if ($con->query($sql) === TRUE) 
                {
                    echo "You are Undubdcribed now";
                    
                  } else {
                    echo "Error: " . $sql . "<br>" . $con->error;
                  }
?>
