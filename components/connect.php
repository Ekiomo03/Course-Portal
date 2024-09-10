<?php

$servername = 'localhost';
$usernamedb ='root';
$passwordDB = '';
$dbname = 'student_registration';

$conn = mysqli_connect($servername, $usernamedb, $passwordDB, $dbname);

if (!$conn) {
    die("Failed to connect DB ". mysqli_connect_error($conn));
}

$sql = "SELECT * FROM student_bio WHERE matric_no = '$matric_no' OR email = '$email'";
    $result = mysqli_query($conn, $sql);
    $rowcount = mysqli_num_rows($result);

    if ($rowcount > 0) {
        $errors["header"] = "*Profile already exists";
    }
    // $sql = "SELECT * FROM student_bio WHERE fullname = '$fullname'";
    // $result = mysqli_query($conn, $sql);
    // $rowcount = mysqli_num_rows($result);

    // if ($rowcount > 0) {
    //     $errors["username"] = "Username already exists";
    // }
?>