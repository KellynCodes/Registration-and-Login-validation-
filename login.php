<?php 

session_start();

include 'conn.php';

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email' && password = '$password'";
    $execute = mysqli_query($conn,$sql);

$num = mysqli_num_rows($execute);

if($num == 1){
    while($row = mysqli_fetch_array($execute)){
        $_SESSION['id'] = $row['id'];
        $_SESSION['surname'] = $row['surname'];
        $_SESSION['lastname'] = $row['lastname'];
        $_SESSION['phone_number'] = $row['phone_number'];
        $_SESSION['local_govt'] = $row['local_govt'];
        $_SESSION['gender'] = $row['gender'];
       $_SESSION['email'] = $row['email'];
        $_SESSION['password'] = $row['password'];
    
        header("Location: fullpage.php");
    }
  
}else{
    $msg = "User does not exist please check your password or email if it is incorrect";
    $msgtype = "danger";
}


}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enugu Tech Hub Login Page</title>

    <link rel="stylesheet" href="oversier.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="shortcut icon" href="kellyncodesLogo.PNG" type="icon">

    <style>
        body{
            background: smokewhite;
        }
        .login_nav{
            font-size: 1.3rem;
            color: deepskyblue;

        }
      
    </style>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="text-center login_nav container-fluid bg-dark p-3">Welcome To Enugu Tech Hub <br>
                <center>You can Login in From Here</center>
    </div>
        <div class="col-md-3"></div>
            <div class="col-md-6 shadow" style="margin-top: 100px ">
            <div class="text-center alert alert-<?php echo $msgtype ?>"> <?php echo $msg ?></div>
                <form action="" method="post">
                    <input name="email" type="email" placeholder="Email" class="form-control mb-4" required>
                    <input name="password" type="password" placeholder="Password" class="form-control mb-4" required>
                    <button name="login" class="btn btn-primary container-fluid mb-5">Login</button>
                </form>
       


                <p>Don't have an account <a class="btn" href="register.php">Register</a></p>

            </div>
    </div>
</div>
    
</body>
</html>