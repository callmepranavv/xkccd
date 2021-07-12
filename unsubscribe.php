

<?php
require 'configure.php';
$email=$_GET['email'];


$sql="DELETE FROM `users` WHERE email ='$email'";
if ($con->query($sql) === TRUE) 
                {
                    echo "<html>
<head>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="message"><h2> You are unsubscribed now</h2> </div>
</body>
</html>
                   
                    ";
                    
                  } else {
                    echo "Error: " . $sql . "<br>" . $con->error;
                  }
?>
