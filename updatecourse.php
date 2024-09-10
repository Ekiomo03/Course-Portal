<?php 
        include_once "./helper/function.php";
        $conn = connect();
        userNotLoggedInAndRedirect();
?>
<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $course_id = testvalues($_POST["course_id"]);
    $course_code = strtoupper(testvalues($_POST["course_code"]));
    $course_name = strtoupper(testvalues($_POST["course_name"]));

    $sql = "UPDATE courses 
            SET course_name = COALESCE(NULLIF('$course_name',''),course_name), 
                course_code = COALESCE(NULLIF('$course_code',''),course_code)
                WHERE course_id = $course_id";

    $result = query($conn, $sql);
    if ($result) {

        $conn = null;
        $stmt = null;

        header("location: courses.php");
        exit;
    }
    
}
function testvalues($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

?>