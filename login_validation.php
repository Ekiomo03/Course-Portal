<?php
// connect to database
require_once "./helper/function.php";
// initialise array to store errors
$errors = array();

// initialise variables
$matric_no = $password = "" ;
const LAST_ACTIVITY = "" ;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $matric_no = testvalues($_POST["matric_no"]);
    $password = testvalues($_POST["password"]);

    loginUser($matric_no, $password);

     redirect("login.php");
}

function testvalues($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function loginUser($matric_no, $password) {

    // initialise array to store errors
    $errors = array();
    
    $student = getUserInfo($matric_no);

    if ($student) {
        if (password_verify($password, $student["password"])) {
            $errors["success"] = "login successful";
    
            // var_dump($sql);
            // header("location: login.php");
            // die();
        }else {
            $errors['password'] = "*Incorrect Password";
        }
    }else {
        $errors['matric_no'] = "*Matric no. does not exist";
    }

    if (empty($matric_no)) {
        $errors["matric_no"] = "*Enter your matric no.";
   }

    if (empty($password)) {
        $errors["password"] = "*Password required";
    }

    //require_once "components\connectlogin.php";

    if (empty($errors))
    {
        $errors["success"] = "login successful";
    }


    $_SESSION["student_id"] = $student["student_id"];
    $_SESSION["errors"] = $errors;
    $_SESSION["matric_no"] = $matric_no;


}
?>