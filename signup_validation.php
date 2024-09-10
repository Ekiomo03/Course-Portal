<?php
// session_start
session_start();
// initialise array to store errors
$errors = array();

// initialise variables
$fullname = $matric_no = $department = $email = $address =  $password = $cpaswword = "" ;
$filename = $imageFileType = $profilepicture = "";


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $fullname = ucwords(testvalues($_POST["fullname"]), " ");
    $matric_no = testvalues(($_POST["matric_no"]));
    $department = ucwords(testvalues($_POST["department"]), " ");
    $email = testvalues($_POST["email"]);
    $address = ucwords(testvalues($_POST["address"])," ");
    $password = testvalues($_POST["password"]);
    $cpassword = testvalues($_POST["cpassword"]);
    $filename = basename($_FILES["file"]["name"]);
    $target_dir = "asset/images/";

    $passwordhash = password_hash($password, '2y');
    
    if (empty($fullname)) {
        $errors["fullname"] = "*Enter your full name";
    }elseif (!preg_match("/^([a-zA-Z' ]+)$/", $fullname)) {
        $errors["fullname"] = "*Invalid name given";
    }

    if (empty($matric_no)) {
        $errors["matric_no"] = "*Enter your matric no.";
    }elseif (filter_var($matric_no, 257) === false) {
        $errors["matric_no"] = "*Matric no. is not valid";
    }elseif (strlen($matric_no) < 9 || strlen($matric_no) > 9) {
        $errors["matric_no"] = "*Incorrect matric no.";
    }

    if (empty($department)) {
        $errors["department"] = "*Enter your department";
    }elseif (!preg_match("/^([a-zA-Z' ]+)$/", $department)) {
        $errors["department"] = "*Invalid department name ";
    }

    if (empty($email)) {
        $errors["email"] = "*Enter your email";
    }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors["email"] = "* $email is not a valid email address";
    }

    if (empty($address)) {
        $errors["address"] = "*Enter your address";
    }

    if (empty($password)) {
        $errors["password"] = "*Password required";
    }elseif (strlen($password) < 8) {
        $errors["password"] = "*Your password must contain at least 8 characters";
    }

    if ($cpassword !== $password) {
        $errors["cpassword"] = "*Password does not match";
    }

    require "./helper/connectdb.php";
    if (empty($fullname) && empty($matric_no) && empty($department) && empty($email) && empty($address) && empty($password)) {
        $errors = [];
        $errors["header"] = "*All Fields Required";
    }

    $sql = "SELECT * FROM student_bio WHERE matric_no = '$matric_no' OR email = '$email'";
    $result = mysqli_query($conn, $sql);
    $rowcount = mysqli_num_rows($result);

    if ($rowcount > 0) {
        $errors = [];
        $errors["header"] = "*Profile already exists";
    }

    if (!empty($_FILES["file"]["name"])) {

        $filename = basename($_FILES["file"]["name"]);
        $target_filepath = $target_dir . $filename;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_filepath,PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["file"]["tmp_name"]);
        if($check !== false) {
        //echo "File is an image - " . $check["mime"] . "</br>";
        $uploadOk = 1;
        } else {
        //$errors["file"] = "File is not an image."."</br>";
        $uploadOk = 0;
        }
    
  
        // Check file size
        if ($_FILES["file"]["size"] > 3000000) {
            $errors["file"] = "*Max image size - 3MB."."</br>";
            $uploadOk = 0;
        }
        
        // allow certain file format
        $allowtypes = array('jpg', 'png', 'jpeg', 'gif');
        if(in_array($imageFileType, $allowtypes)) {
            $uploadOk = 1;
        }else {
        $errors["file"] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed."."</br>";
        $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
        $errors["file"];
        // if everything is ok, try to upload file
        }else {

            if (empty($errors)){
                
                $errors["success"] = "signup successful";
                if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_filepath)) {
                    //echo "The file ". htmlspecialchars( $filename. " has been uploaded.")."</br>"; 
                    $sql = 'INSERT INTO student_bio(fullname, matric_no, department, email, address, password, image)
                            VALUES ( ?, ?, ?, ?, ?, ?, ?)';
                    $stmt = mysqli_stmt_init($conn);
                    $prepare_stmt = mysqli_stmt_prepare($stmt,$sql);
                        if ($prepare_stmt) {
                            mysqli_stmt_bind_param($stmt, "sisssss", $fullname, $matric_no, $department, $email, $address, $passwordhash, $filename);
                            mysqli_stmt_execute($stmt);
                        }else{
                            die('Something went wrong ');
                        }
                }
            }
            
            mysqli_close($conn);
        }

                
    }
    $_SESSION["errors"] = $errors;
    header("location: index.php");
}

function testvalues($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>