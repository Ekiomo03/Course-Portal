<?php

// file upload directory

$target_dir = "images/";

if (isset($_POST["btn"])) {
  if (!empty($_FILES["file"]["name"])) {

      $filename = basename($_FILES["file"]["name"]);
      echo $filename;
      $target_filepath = $target_dir . $filename;
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_filepath,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
// if(isset($_POST["submit"]))  {
//   echo "<pre>";
// print_r($_FILES);
// echo "</pre>";
//   exit;
  $check = getimagesize($_FILES["file"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . "</br>";
    $uploadOk = 1;
  } else {
    //$errors["profilepicture"] = "File is not an image."."</br>";
    $uploadOk = 0;
  }
}
// Check if file already exists
// if (file_exists($target_filepath)) {
//     echo "Sorry, file already exists."."</br>";
//     $uploadOk = 0;
//   }
  // Check file size
if ($_FILES["file"]["size"] > 3000000) {
    echo "Max size 3MB."."</br>";
    $uploadOk = 0;
  }
  
  // allow certain file format
  $allowtypes = array('jpg', 'png', 'jpeg', 'gif');
  if(in_array($imageFileType, $allowtypes)) {
  }else {
    $errors["header"] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed."."</br>";
    $uploadOk = 0;
  }
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded."."</br>";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_filepath)) {
      echo "The file ". htmlspecialchars( $filename. " has been uploaded.")."</br>"; 
$sql = 'INSERT INTO student_bio(fullname, matric_no, department, email, address, password, image)
                 VALUES ( ?, ?, ?, ?, ?, ?, ?)';
 $stmt = mysqli_stmt_init($conn);
 $prepare_stmt = mysqli_stmt_prepare($stmt,$sql);
 if ($prepare_stmt) {
     mysqli_stmt_bind_param($stmt, "sisssss", $fullname, $matric_no, $department, $email, $address, $passwordhash, $filename);

     mysqli_stmt_execute($stmt);
     echo "You are registered successfully!";
 } else{
         die('Something went wrong ');
 }
}
}

 mysqli_close($conn);
}
 

