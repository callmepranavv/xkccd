<?php
session_start();
include_once 'configure.php';
if(isset($_POST['name']) && !empty($_POST['name']) AND isset($_POST['email']) && !empty($_POST['email']))
{
   //$name =  mysqli_real_escape_string($_POST['name']); // Turn our post into a local variable
    //$email =  mysqli_real_escape_string($_POST['email']); // Turn our post into a local variable
 // $email=$_POST["email"];mysqli_real_escape_string
 $_SESSION['email']=mysqli_real_escape_string($con,$_POST['email']);
 $email=$_SESSION['email'];
 $_SESSION['name']=mysqli_real_escape_string($con,$_POST['name']);
 $name=$_SESSION['name'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        echo("Please enter a valid email address");
    } 
    else{
      
        $result = $con->query("SELECT * FROM users WHERE email='$email'");
        if($result->num_rows == 0) {
             // row not found, do stuff...
             require_once "sendmail.php";
             header("Location:verify.php");
        } 
        else {
            echo "Email already exists. Use another emailID.";
        }
       //header('Location:sendmail.php');
       
    }
    
    
} 
?>
<!DOCTYPE html>
<head></head>
<body> 
    <form action="" method=post>
        <input type="text" id="name" name="name" placeholder="enter your Name" required>
        <br><input type="email" id="email" name="email" placeholder="Enter your Email Id" required>
        <br><button type="submit" >Submit</button>
    </form>
</body>
</html>
