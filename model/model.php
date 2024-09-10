<?php 

function preparequery($conn, $sql, $types, ...$params) {
    
    $stmt = mysqli_stmt_init($conn);
    $prepare_stmt = mysqli_stmt_prepare($stmt,$sql);
        if ($prepare_stmt) {
            mysqli_stmt_bind_param($stmt, $types, ...$params);
            mysqli_stmt_execute($stmt);
        }else{
            die('Something went wrong ');
        }
        $conn = null;
        $stmt = null;
}

function query($conn, $sql, $arr = false){
    $result = mysqli_query($conn, $sql);
    if($arr  ==true){
        $result = mysqli_fetch_array($result);
    }
    return $result;

}
?>