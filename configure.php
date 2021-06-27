<?php
//$con = new mysqli("xkcd.chbxfg8zu9jd.us-east-2.rds.amazonaws.com","admin","rky4418291","xkcd", "3306");
$con=mysqli_connect('us-cdbr-east-04.cleardb.com','bc4e5f17c88182','6c3ec0ea','heroku_8bd14e111ed2fa5');
if(mysqli_connect_errno())
{
    echo "Failed to connect to MYSQL:".mysqli_connect_errno();
    exit();
}

?>