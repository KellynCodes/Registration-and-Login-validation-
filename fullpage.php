<?php

session_start();
include 'conn.php';



if(!isset($_SESSION['email']) || !isset($_SESSION['password'])){
    header("location: login.php");
}else{
   $_SESSION['id'];
   $_SESSION['surname'];
   $_SESSION['lastname'];
   $_SESSION['phone_number'];
   $_SESSION['local_govt'];
   $_SESSION['email'];
   $_SESSION['password'];
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enugu Tech Hub Registered Members</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="shortcut icon" href="kellyncodesLogo.PNG" type="icon">
</head>
<body>

<?php

$id = $_SESSION['id'];

$fetch_data = "SELECT * FROM users WHERE id = '$id'";
$exe = mysqli_query($conn,$fetch_data);
    
while($row = mysqli_fetch_array($exe)){
    $surname = $row['surname'];
    $lastname = $row['lastname'];

    $msgtype = 'alert';





?>

<center>
    <div class="col-md-4">

    <div class=" bg-info alert alert-<?php echo $msgtype ?> ">YOur welcome <b><?php echo $surname." ".$lastname?> </b>
</div>
       
</div>
</center>
<?php  } ?>

<center> <a href="logout.php" class="btn btn-info">Logout</a></center>

<div class="container">

</div>

</body>
</html>
