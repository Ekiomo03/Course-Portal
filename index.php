<?php
// session_start();

include_once "helper/function.php";
userLoggedInAndRedirect();

$errors = $_SESSION["errors"] ?? [];

if (isset($_SESSION["errors"]["success"])){
     redirect('login.php');
}else {
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
    <?php //include './header.php' ?>

    <!-- Main Content Section -->
    <main>
        <?php require_once "components\index.php" ?> 


    <!-- Footer Section -->
    <?php //require './footer.php' ?>
   
</body>
</html>
      
<?php };?>

<?php 
unset($_SESSION["errors"]);
?>