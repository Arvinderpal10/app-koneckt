<?php

$con = mysqli_connect('localhost','root','','konnekt');
if(mysqli_connect_errno()){
  echo "Failed to connect ". mysqli_connect_errno();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Koneckt: Welcomes You!</title>
</head>
<body>
  <h1>Koneckt: Welcomes You</h1>
</body>
</html>