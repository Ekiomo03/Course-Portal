<?php

session_start();
global $student_id;
global $matric_no;
require "helper/connectdb.php" ;
include_once "model/model.php";
$conn = connect();

function checkUserLoggedIn() {
    if (!isset($_SESSION["student_id"])){
        return false;
    }
    return true;
}

function redirect($path) {
    return header("location: $path");
}

function userNotLoggedInAndRedirect($path = "login.php"){
    if (!checkUserLoggedIn()){
        redirect($path);
    }
    $matric_no = $_SESSION["matric_no"];
    $student_id = $_SESSION["student_id"];
}

function userLoggedInAndRedirect($path = "home.php"){
    if (checkUserLoggedIn()){
        redirect($path);
    }
    return true;
}

function getUserInfo($matric_no) {
    $conn = connect();
    
    $sql = "SELECT * FROM student_bio WHERE matric_no = '$matric_no'";
    $student = query($conn, $sql, true);
    return $student;
}

function getUserCourses($student_id) {
    $conn = connect();
    $sql = "SELECT * FROM courses WHERE student_id = '$student_id'";
    return query($conn, $sql);
}

function getCourseInfo() {
    $conn = connect();
    global $id;

    $id = $_GET['id'] ?? null;

    if (!$id ) {
        echo "id required";
        exit;
    }

    $sql = "SELECT * FROM courses WHERE course_id ='$id'";
    $result = query($conn, $sql, true);

    if (!$result) {
        echo "course not found";
        redirect('courses.php');
        exit;
    }
    // var_dump($result);
   return $result;

}

function userLastActivitySet() {
    if(!isset($_SESSION["last_activity"]) && isset($_SESSION['student_id'])){
    $_SESSION["last_activity"] = time();
    return $_SESSION["last_activity"];
}
}

function trackUserActivity($timeout_duration = 120) {
    // Set timeout period in 1 minute

    // Check if the "last activity" session variable is set
    if (isset($_SESSION['last_activity'])) {
        
        //var_dump($_SESSION['last_activity']);
        // Calculate the session lifetime
        $elapsed_time = time() - $_SESSION['last_activity'];
    
        // If the session has expired, destroy it and redirect to the logout page
        if ($elapsed_time >= $timeout_duration) {
            header("Location: logout.php");
            exit();
        }
    }
}