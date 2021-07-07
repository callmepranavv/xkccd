<?php
session_start();
include_once 'configure.php';
if(isset($_POST['name']) && !empty($_POST['name']) AND isset($_POST['email']) && !empty($_POST['email']))
{

 $_SESSION['email']=mysqli_real_escape_string($con,$_POST['email']);
 $email=$_SESSION['email'];
 $_SESSION['name']=mysqli_real_escape_string($con,$_POST['name']);
 $name=$_SESSION['name'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $error_message="Please enter a valid email address";
    } 
    else{
      
        $result = $con->query("SELECT * FROM users WHERE email='$email'");
        if($result->num_rows == 0) {
             // row not found, do stuff...
             require_once "mail.php";
             header("Location:verify.php");
        } 
        else {
          $error_message="Email already exists. Use another emailID.";
        }
       
    }
    
    
} 
?>
<!DOCTYPE html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">
</head>
<body> 
    
    <div class="container">
    <div class="title">XKCD Comics</div>
    <div class="inputs">
    <form action="" method=post>
        <input type="text" id="name" name="name" placeholder="enter your Name" required>
        <br><input type="email" id="email" name="email" placeholder="Enter your Email Id" required>
        <br><button type="submit" >SUBSCRIBE</button>
    </form>
</div>
<?php
		if(!empty($error_message)) {
	?>
	<div class="message"><?php echo $error_message; ?></div>
	<?php
		}
	?>
</div>
</body>
</html>
