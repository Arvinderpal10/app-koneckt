<?php

$con = mysqli_connect('localhost','root','','konnekt');
if(mysqli_connect_errno()){
  echo "Failed to connect ". mysqli_connect_errno();
}
//Variables to handle form values
$fname="";
$lname="";
$email="";
$password="";
$password2="";
$date="";  // Sign up date
$error_array=""; //for displaying errors

if(isset($_POST['register_button'])){
  // First Name
  $fname= strip_tags($_POST['reg_fname']); // to remove HTML tags
  $fname = str_replace(' ','',$fname);     // removes unnecessary spaces 
  $fname = ucfirst(strtolower($fname));    // capitalize first letter

  //Last Name
  $lname= strip_tags($_POST['reg_lname']);
  $lname = str_replace(' ','',$lname);      
  $lname = ucfirst(strtolower($lname)); 

 //email
  $email= strip_tags($_POST['reg_email']);
  $email = str_replace(' ','',$email); 
  
  //password
  $password= strip_tags($_POST['reg_password']);

  //confirm password
  $password2= strip_tags($_POST['reg_password2']);

  $date= date('Y-m-d');   // current date

  //email validation
  if(filter_var($email,FILTER_VALIDATE_EMAIL)){
    $email= filter_var($email,FILTER_VALIDATE_EMAIL);


    // check if email is already in use 
    $email_check= mysqli_query($con,"select email from users where email='$email'");
    $num_rows=mysqli_num_rows($email_check);
    if($num_rows>0){
      echo "Email already is in use";
    }
  }
  else{
    echo "Invalid Format of email";
  }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>koneckt:Register with us</title>
</head>
<body>
 <form action="register.php" method="post">
    <input type="text" name="reg_fname" placeholder="Enter your first name" required>
    <br>
    <input type="text" name="reg_lname" placeholder="Enter your last name" required>
    <br>
    <input type="email" name="reg_email" placeholder="Enter your email" required>
    <br>
    <input type="password" name="reg_password" placeholder="Enter password" required>
    <br>
    <input type="password" name="reg_password2" placeholder="Confirm password" required>
    <br>
    <input type="submit" name="register_button" value="Register">

 </form>
</body>
</html>