<?php
        include_once 'dashboard.php';
?>

            <div class="main-top">
                <p><h1 style="text-align: left;">Messages Section</h1><i class="bx bxs-envelope"></i></p>
            </div>
        </div>
                <div class="main">
                <div class="main-messages">
                    <nav class="box">
                        <h4>TOTAL COUNT OF COURSES
                            <p><?php
                            $result = getUserCourses($student['student_id']);
                            echo mysqli_num_rows($result); 
                            ?></p>
                        </h4>
                    </nav>
                </div>
                <!--<div class="main-messages">
                    <nav class="box">
                        <p><h4>Course Registration is closed for this semester</h5></p>
                    </nav>
                </div>
                <div class="main-messages">
                    <nav class="box">
                        <p><h4>Course Registration is closed for this semester</h5></p>
                    </nav> -->
                </div>
</div>
    </div>
</body>