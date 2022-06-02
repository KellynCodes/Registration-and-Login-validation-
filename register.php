<?php

session_start();

include 'conn.php';

if(isset($_POST['register'])){
    $surname = $_POST['surname'];
    $lastname = $_POST['lastname'];
    $phone_number = $_POST['phone_number'];
    $local_govt = $_POST['local_govt'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $password = $_POST['password'];


  if(strlen($email) > 5){
    if(strlen($password) > 5){
    $mysql = "SELECT * FROM users where email = '$email'";
    $exect = mysqli_query($conn, $mysql) or die (mysqli_error());
    $nums = mysqli_num_rows($exect);

    if($nums == 0){
        
    $database = "INSERT INTO users(surname,lastname,phone,local_govt,gender,email,password) 
    values('$surname', '$lastname', '$phone_number', '$local_govt', '$gender','$email', '$password')";
     $execute = mysqli_query($conn,$database);

header("Location: fullpage.php");
// if($execute){
//     echo $msg = 'Registration successfully';
//     $msgtype = "alert";
// }
    }else{
        $msg = "Email Already Exist";
        $msgtype = "warning";
    }

    }else{
        $msg = "Password must be more than 5 characters for your account security";
        $msgtype = "warning";
    }
    
 }else{
     $msg = "Email is not Valid";
     $msgtype = "warning";
 }

    
}


$sqlselection ="SELECT * FROM users where email = '$email' and password = '$password'";
$executed = mysqli_query($conn,$sqlselection) or die (mysqli_error($conn));
$num = mysqli_num_rows($executed);
if($num == 1){
  while($row=mysqli_fetch_array($execute)){
    $_SESSION['id'] = $row['id'];
    $_SESSION['surname'] = $row['surname'];
    $_SESSION['lastname'] = $row['lastname'];
    $_SESSION['local_govt'] = $row['local_govt'];
    $_SESSION['gender'] = $row['gender'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['password'] = $row['password'];
  }
  }else{
    echo mysqli_error($conn);
}

?>









<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enugu Tech Hub Register Page</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="oversier.css">
    <link rel="shortcut icon" href="kellyncodesLogo.PNG" type="icon">
</head>
<body>
    <div class="container">
        <div class="row">


            <div class="col-md-3"></div>
            <div class="col-md-6 shadow p-3" style="margin-top: 100px">

            
        <center>
            <h4>Register Today To enjoy our Free digital skill Training</h4>
        </center>
        
                <form action="" method="post">
                    <div class="alert alert-<?php echo $msgtype ?>"><?php echo $msg ?></div>

                <input class="form-control mb-3" type="text" name="surname" placeholder="Surname" required>
                <input class="form-control mb-3" type="text" name="lastname" placeholder="Lastname" required>
                <input class="form-control mb-3" type="number" name="phone_number" placeholder="Phone Number" required>

                <select class="form-control mb-3" name="local_govt" required>
                <option>Choose Your Local Government</option>
                <option>Igbo Eze North</option>
                <option>Udenu</option>
                <option>Igbo Etiti</option>
                <option>Isienu</option>
                <option>Isi Uzo</option>
                </select>

                <select name="gender"class="form-control mb-3" required>
                    <option> Gender </option>
                    <option> Male </option>
                 <option>Female</option>

                </select>
                
                <input class="form-control mb-3" type="email" name="email" placeholder="Your Email" required>
                <input class="form-control mb-3" type="password" name="password" placeholder="Password" required>

                <button class="container p-2 btn-primary mb-5" name="register">Register</button>

                <p>Already have an account <a class="btn" href="login.php">Login</a></p>

               

                </form>
            </div>
        </div>
    </div>
</body>
</html>