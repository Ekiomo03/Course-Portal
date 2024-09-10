<?php

session_start();

$servername = "localhost";
$usernamedb = "root";
$passwordDB = "";
$dbname = "student_registration";

$conn = mysqli_connect($servername, $usernamedb, $passwordDB, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error($conn));
}

if (isset($_SESSION["student_id"])) {
    $matric_no = $_SESSION["matric_no"];
    $student_id = $_SESSION["student_id"];
    // query to get student info

    $sql = "SELECT * FROM student_bio WHERE student_id = '$student_id'";
    $result = mysqli_query($conn, $sql);
    $student = mysqli_fetch_array($result, MYSQLI_ASSOC);
}


include "./dashboard.php";
?>


        <section class="main">
            <div class="main-top">
                <p><h1>Registered Courses</h1><i class="bx bxs-user"></i></p>
                
            </div>

            <div class="main-course">
                <?php
                // database connection

                $servername = "localhost";
                $usernamedb = "root";
                $passwordDB = "";
                $dbname = "student_registration";

                $conn = mysqli_connect($servername, $usernamedb, $passwordDB, $dbname);

                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error($conn));
                }

                if (isset($_SESSION["student_id"])) {
                    $student_id = $_SESSION["student_id"];

                    // query to get student info

                    $sql = "SELECT * FROM courses WHERE student_id = '$student_id'";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                    
                    echo "<table border = '1' style='width: 50%; margin-top: 10px; text-align: center;' >";
                    echo "<tr><th>Course ID</th><th>Course Title</th>";
                     while ($student = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    
                    echo "<tr>";
                    echo "<td>" . $student["course_id"] . "</td>";
                    echo "<td>" . $student["course_name"] . "</td>";
                    echo "<td>";
                    echo "<a href='edit_course.php?id=". $student["course_id"] ."'>Edit</a> ";
                    echo "</td>";
                    echo "</tr>";
                    }
                    
                    echo "</table>";

                    echo "<br>";
                    // echo "<button>Print</button>";
                }else {
                    echo "No Registered Courses";
                }
            }else {
                    echo "no student info found";
            }

                mysqli_close($conn);
                ?>
            </div>

        </section>
    </div>
</body>            