<?php 
        require_once 'dashboard.php';
        $student = getUserInfo($_SESSION['matric_no']);
        $fullnameArray = explode(" ", $student["fullname"]);
?>  

            <div class="main-top">
                <p><h1>Your Profile</h1><i class="bx bxs-user"></i></p>
            </div>
        </div>
        
            <section class="main">
            <div class="main-profile">
                <?php
                // database connection

                if (isset($student["student_id"])) {

                    ?>
                    <table class="profile-table">
                    <tr>
                    <th>Surname</th>
                    <td><?php echo $fullnameArray[0] ?? ''; ?></td>
                    </tr>

                    <tr>
                    <th>Firstname</th>
                    <td><?php echo $fullnameArray[1] ?? ''; ?></td>
                    </tr>

                    <tr>
                    <th>Middlename</th>
                    <td><?php echo $fullnameArray[2] ?? ''; ?></td>
                    </tr>

                    <tr>
                    <th>Matric_no</th>
                    <td><?php echo $student["matric_no"] ?? ''; ?></td>
                    </tr>

                    <tr>
                    <th>Department</th>
                    <td><?php echo $student["department"] ?? ''; ?></td>
                    </tr>

                    <tr>
                    <th>Email</th>
                    <td><?php echo $student["email"] ?? ''; ?></td>
                    </tr>

                    <tr>
                    <th>Address</th>
                    <td><?php echo $student["address"] ?? ''; ?></td>
                    </tr>

                    
                    </table>

                    <br>
                <button 
                style="box-sizing: border-box; border-radius:7px 7px 7px 7px; display: flex; position: absolute; box-shadow: 0px 0px 1px 1px rgb(0, 0, 0)">
                <a style="font-size:1.3em" href='editprofile.php'>Edit Profile</a></button>
                    
                <?php }else {
                    echo "No Student Info Found";} 
                ?>

                
            </div>

        </section>
    </div>
</body>            