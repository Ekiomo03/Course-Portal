<?php
    session_start();
    $errors = $_SESSION["errors"] ?? [];

    if (isset($_SESSION["errors"]["success"]) && isset($_SESSION["student_id"])){
        header("location: home.php"); 
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Course Registration Portal</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./asset/css/style.css"> 
</head>
<body>
     <!-- Header Section -->

    <section class=" login-wrapper">
        <header>WELCOME TO THE UNDERGRADUATE STUDENT COURSE REGISTRATION PORTAL</header>
        <form action="login_validation.php" method="post">
            <!-- <div class="ekii">
                <img src="../components/assets/img/logo(3).png" alt="image">
            </div> -->
            <div class="input-box">
                <!-- <label for="matric-no">Matric No.</label> -->
                <input type="text" onclick="document.getElementById('merrors').innerHTML = '';" name="matric_no" id="" placeholder="Enter matric no.">
            </div>
            <p><span id="merrors" class="errors"><?php echo $errors["matric_no"] ?? ""; ?></span></p>
            
            <div class="input-box">
                <!-- <label for="password">Password</label> -->
                <input type="password" onclick="document.getElementById('perrors').innerHTML = '';" name="password" id="" placeholder="Enter password">
            </div>
            <p><span id="perrors" class="errors"><?php echo $errors["password"] ?? ""; ?></span></p>

            <div class="register-link">Not yet registered?.<a href="index.php">Click here</a></div>
            <button type="submit"> Login</button>
            <br><br><hr>
    </section>

            
    <!-- Footer Section -->

</body>