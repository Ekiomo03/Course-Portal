<?php 
include_once "./helper/function.php";
$conn = connect();
userNotLoggedInAndRedirect();
$student = getUserInfo($_SESSION['matric_no']);



$errors = [];
$department = $email = $address = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $fullname = ucwords(testvalues($_POST["fullname"]), " ");
    $department = ucwords(testvalues($_POST["department"]), " ");
    $email = testvalues($_POST["email"]);
    $address = ucwords(testvalues($_POST["address"])," ");


    $sql = "UPDATE student_bio
            SET fullname = COALESCE(NULLIF('$fullname',''),fullname),
            department =COALESCE(NULLIF('$department',''),department),
            email = COALESCE(NULLIF('$email',''),email), 
            address = COALESCE(NULLIF('$address',''),address) 
            WHERE student_id = '$student[student_id]'";
    
    // to use prepared statement
    // $stmt = mysqli_stmt_init($conn);
    // $prepare_stmt = mysqli_stmt_prepare($stmt,$sql);
    $result = query($conn, $sql);

        if ($result) {
            echo "Profile updated successfully";

            // prepared statement
            // mysqli_stmt_bind_param($stmt,"sssi", $department, $email, $address, $student_id);
            // mysqli_stmt_execute($stmt);
            // Optionally, you can redirect to a profile page or show a success message
            
            
        } else {
            // Error updating profile
            echo "Error updating profile: " . mysqli_error($conn);
            exit;
        }
        
         header("location: profile.php");
        exit;
}

function testvalues($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

?>