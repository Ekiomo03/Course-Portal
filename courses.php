<?php
require_once 'dashboard.php';
$student = getUserInfo($_SESSION['matric_no']);
$student_id = $student['student_id'];

?>
        
            <div class="main-top">
                <p><h1>Course Registration</h1><i class="bx bxs-book"></i></p>
                
            </div>
        </div>
        <section class="main">
            <div style="margin-top:5px;" class="column">
            <form action="./coursesval.php" method="POST">
                <div class="input-box">
                <label for="course_code">Course Code</label><br>
                <input style="padding: 7px 12px; font-size:1em; " type="text" name="course_code" id="course_code"><br><br>
                </div>

                <div class="input-box">
                <label for="course_name">Course Title</label><br>
                <input style="padding: 7px 10px; font-size:1em; " type="text" name="course_name" id="course_name"><br><br>
                </div>
                <button type="submit" style="background-color: #ddd; border-radius: 5px; border: 1.5px solid #1a1a1a; box-sizing:border-box; display:inline-block; min-height: 25px; font-size:14px; padding: 7px 12px; cursor: pointer;">
                Register</button>
            </form>
            </div>

            <br>
            <h2>Registered Courses</h2>
            <table border="1" style="width: 70%;">
                
                    <?php 
                    
                    $result = getUserCourses($student_id);

                    if (mysqli_num_rows($result) > 0) {
                    
                        echo "<br><tr><th>Course Code</th><th>Course Title</th>";
                        while ($student = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    ?>
                    <tr>
                    <td style="text-align: left;"> <?php echo $student["course_code"] ?? ''; ?></td>
                    <td style="text-align: left;"> <?php echo $student["course_name"] ?? ''; ?></td>
                    <td style="text-align: left;" hidden> <?php echo $student["course_id"] ?></td>
                    <td>
                    <a style="text-align: center; width: 100%; padding: 15px;" href='edit_course.php?id=<?php echo $student["course_id"];?>'>EDIT</a>
                    </td>
                    <td>
                    <a style="text-align: center; width: 100%; padding: 15px;" href='deletecourse.php?id=<?php echo $student["course_id"];?>'>DELETE</a>
                    </td>
                    </tr>
                    

                <?php }
                }else {
                    echo "No Registered Courses";
                } ?>
            </table>
            
        </section>
    </div>
</body>    
                        
                    
                    
                    