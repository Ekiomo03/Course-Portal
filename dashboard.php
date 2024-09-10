<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./asset/css/home.css"> 
    <style>

    .profile-table{
    border-collapse: collapse;
    margin: 15px 0;
    font-size: 1.0em;
    width: 100%;
    min-width: 400px;
    border-radius: 7px 7px 0 0;
    overflow: hidden;
    box-shadow: 10px 10px rgba(0, 0, 0, 0.15);
    }

    .profile-table tr th{
    background-color: #fff;
    color: #000;
    font-weight: bold;
    text-align: left;
    }

    .profile-table th,
    .profile-table td{
        padding: 12px 15px;
        
    }

    .profile-table tbody tr{
        border-bottom: 1px solid #ddd;
    }

    .profile-table tbody tr:nth-of-type(odd){
        background-color: #f3f3f3;
    }

    .profile-table tbody tr:last-of-type{
        border-bottom: 2px solid #555;
    }
    
</style>
</head>
<body>
    <div class="container">
        
        <nav class="dashboard">
            <ul>
                <li><a href="./home.php" class="logo">
                    <i class='bx bxs-dashboard' type="solid"></i>
                    <span class="nav-item">DashBoard</span>
                </a></li>
                <p><h5 style="color: #fff; padding: 10px;">INTERFACE</h3></p>
                <li><a href="./home.php">
                    <i class='bx bxs-home'></i>
                    <span  class="nav-item">Home</span>
                </a></li>
                <li><a href="profile.php">
                    <i class='bx bxs-user'></i>
                    <span class="nav-item">Profile</span>
                </a></li>
                <li><a href="./courses.php">
                    <i class='bx bxs-book'></i>
                    <span class="nav-item">Course Services</span>
                </a></li>
                <!-- <li><a href="print.php">
                    <i class='bx bxs-printer' type="solid"></i>
                    <span class="nav-item">Print Services</span>
                </a></li> -->
                <!-- <li><a href="#">
                    <i class='bx bxs-cog'></i>
                    <span class="nav-item">Settings</span>
                </a></li> -->
                <li><a href="./logout.php" class="logout">
                    <i class='bx bxs-log-out'></i>
                    <span class="nav-item">Logout</span>
                </a></li>
            </ul>
        </nav>
        
           
            
                <?php 
                    include_once "./helper/function.php";
                    checkUserLoggedIn();
                    // Update the "last activity" session variable to the current time
                    // $_SESSION['last_activity'] = time();
                    // if(!isset($_SESSION["last_activity"]) && isset($_SESSION['student
                    // _id'])){
                    //     $_SESSION["last_activity"] = time();
                    // }

                    // trackUserActivity();
                    $student = getUserInfo($_SESSION['matric_no']);
                    $image_url = 'asset/images/'. $student["image"]; ?>
                       
        <div class="user-content">
            <div class="user-img">
                <img id="profilepic" src="<?php echo $image_url; ?>" alt="image">
            
