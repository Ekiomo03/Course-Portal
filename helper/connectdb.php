<?php
function connect() {
    global $conn;

 $servername = "localhost";
 $usernamedb = "root";
 $passwordDB = "";
 $dbname = "student_registration";

 $conn = mysqli_connect($servername, $usernamedb, $passwordDB, $dbname);
 return $conn;

 if (!$conn) {
     die("Connection failed: " . mysqli_connect_error($conn));
 }

 
}
 