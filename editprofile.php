<?php
include_once 'dashboard.php';

?>

    
        <br><div class="main-top">
                <p><h1>Edit Profile</h1><i class="bx bxs-user"></i></p>
                
            </div>
        </div>
        <section class="main">
            <form action="./updateprofile.php" method="POST">
            <div class="main-edit">
                <p><label for="fullname">Fullname</label></p>
                        <input type="text" name="fullname" id="" value="<?= $student['fullname'] ?? ''; ?>" placeholder="Enter department">
                        <span class="errors"><?php echo $errors["fullname"] ?? ""; ?></span>
            </div>
            <div class="main-edit">
                <p><label for="department">Department</label></p>
                        <input type="text" name="department" id="" value="<?= $student['department'] ?? ''; ?>" placeholder="Enter department">
                        <span class="errors"><?php echo $errors["department"] ?? ""; ?></span>
            </div>
            <div class="main-edit">
                <p><label for="email">Email</label></p>
                        <input type="text" name="email" id="" value="<?= $student['email'] ?? ''; ?>" placeholder="Enter email">
                        <span class="errors"><?php echo $errors["email"] ?? ""; ?></span>
            </div>
        
            <div class="main-edit">
                    <p><label for="address">Address</label></p>
                    <input type="text" name="address" id="" value="<?= $student['address'] ?? ''; ?>" placeholder="Enter address">
                    <span class="errors"><?php echo $errors["address"] ?? ""; ?></span>
            </div>
            <br>

            <button
            style="box-sizing: border-box; font-size: 1.3em; border-radius:7px 7px 7px 7px; display: flex; position: absolute; box-shadow: 0px 0px 1px 1px rgb(0, 0, 0)">
            <a>Update Profile</a></button>
            </form>
      </div>
    </section>

</body>
</html>