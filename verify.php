<?php
session_start();
   $email=$_SESSION['email'];
   $name=$_SESSION['name'];
    if(isset($_POST['submit']))
    {
        if($_POST["otpv"]==$_SESSION['otp1'])
    {
        require_once 'configure.php';

             // row not found, do stuff...
             $result = $con->query("SELECT * FROM users WHERE email='$email'");
             if($result->num_rows == 0) {
                  // row not found, do stuff...
                  $sql = "INSERT INTO users (username, email) VALUES ('$name', '$email')";
                  if ($con->query($sql) === TRUE) 
                  {
                     header('Location:subscribed.php');
                      
                    } else {
                      echo "Error: " . $sql . "<br>" . $con->error;
                    }
             } 
    }
    else{
        $error_message="invalid otp.";
    } 
}
?>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <div class="title">Verify your mail</div>
    <div class="inputs">
<form action="" method=post>
<input type="text" name="otpv" placeholder="OTP" required>
<button type="submit" name="submit">Submit </button>
</div>

<?php
		if(!empty($error_message)) {
	?>
	<div class="message error_message"><?php echo $error_message; ?></div>
	<?php
		}
	?>
    
    <?php
		if(!empty($message)) {
	?>
	<div class="message error_message"><?php echo $message; ?></div>
	<?php
		}
	?>
</div>
</body>
</html>