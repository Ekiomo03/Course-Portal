<?php
   include_once "./dashboard.php"; 
   getCourseInfo();
   $result = getCourseInfo();



?>
            <div class="main-top">
                    <p><h1>Edit Course</h1><i class="bx bxs-book"></i></p>
                    
            </div>
        </div>
        <section class="main">
            <div class="main-course">
                <form action="./updatecourse.php" method="post">

            <input type="text" name="course_id" id="course_id" value="<?= $result['course_id'] ?? ''; ?>" readonly hidden><br><br>
                <label for="course_code">Course Code</label><br>
            <input style="padding: 7px 10px; font-size:1em;" type="text" name="course_code" id="course_code" value="<?= $result['course_code'] ?? '';?>"><br><br>
            <label for="course_name">Course Title</label><br>
            <input style="padding: 7px 10px; font-size:1em;" type="text" name="course_name" id="course_name" value="<?= $result['course_name'] ?? '';?>"><br><br>

            <button type="submit" style="background-color: #ddd; border-radius: 5px; border: 1.5px solid #1a1a1a; box-sizing:border-box; display:inline-block; min-height: 25px; font-size:14px; padding: 7px 12px; cursor: pointer;">
            Edit Course</button>
                </form> 
            </div>

            </div>

        </section>
    </div>
</body>    
