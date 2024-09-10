<?php  
include_once "./helper/function.php";
$conn = connect();
userNotLoggedInAndRedirect();
$student = getUserInfo($_SESSION['matric_no']);
$student_id = $student['student_id'];

$errors = [];
$course_name = $course_code = '';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SESSION["student_id"])) {

    $course_name = strtoupper(mysqli_real_escape_string($conn,$_POST["course_name"]));
    $course_code = strtoupper(mysqli_real_escape_string($conn,$_POST["course_code"]));

    if (empty($course_name)) {
        $errors["course_name"] = "*Enter your course title";
    }

    if (empty($course_code)) {
        $errors["course_code"] = "*Enter your course code";
    }

    if (empty($errors)) {
        // sql statement to insert course into db
        $sql = "INSERT INTO courses (course_name, course_code, student_id) VALUES ('$course_name', '$course_code', '$student_id')" ;
        $result = query($conn, $sql);
        if ($result) {
            // echo "You are registered successfully!";
        } 
    }
        header("location: courses.php");

}

?>