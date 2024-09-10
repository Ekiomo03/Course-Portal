<?php 
include_once "./helper/function.php";
userNotLoggedInAndRedirect();
$conn = connect();
$student = getUserInfo($_SESSION['matric_no']);
$result = getCourseInfo();
?>

<?php
if (isset($id)) {

    $sql = "DELETE FROM courses WHERE student_id = ? AND course_name = ?";
    $types= "is";
    preparequery($conn, $sql, $types, $student['student_id'], $result["course_name"]);
    header("location: courses.php");
    exit;
    
}else {
    echo "id not found";
}