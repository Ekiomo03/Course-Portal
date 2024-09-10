<section class="wrapper">
            <header>Fresh Undergraduate Registration Form</header>
            <span class="errors"><?php echo $errors["header"] ?? ""; ?></span>
            <form action="signup_validation.php" method="POST" enctype="multipart/form-data">
                <!-- <div class="ekii">
                    <img src="../components/assets/img/logo(3).png" alt="image">
                </div> -->
                <div class="input-box">
                    <label for="fullname">Full Name</label>
                    <input type="text" name="fullname" id="" placeholder="Surname Firstname Middlename">
                </div>
                <span class="errors"><?php echo $errors["fullname"] ?? ""; ?></span>

                <div class="input-box">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="" placeholder="Enter address">
                </div>
                <span class="errors"><?php echo $errors["address"] ?? ""; ?></span>

                <div class="input-box">
                    <label for="matric-no">Matric No.</label>
                    <input type="text" name="matric_no" id="" placeholder="Enter matric no.">
                </div>
                <span class="errors"><?php echo $errors["matric_no"] ?? ""; ?></span>

                <div class="column">
                    <div class="input-box">
                        <label for="department">Department</label>
                        <p><select name="department" id="">
                            <option value="Select Department" selected disabled>Select Department</option>
                            <option value="Computer Science">Computer Science</option>
                            <option value="Computer Engineering">Computer Engineering</option>
                            <option value="Electrical Engineering">Electrical Engineering</option>
                            <option value="Law">Law</option>
                            <option value="Humanities">Humanities</option>
                        </select>
                        <p><span class="errors"><?php echo $errors["department"] ?? ""; ?></span>
                    </div>
        
                    <div class="input-box">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="" placeholder="Enter email">
                        <span class="errors"><?php echo $errors["email"] ?? ""; ?></span>
                    </div>

                </div>

                <div class="column">
                    <div class="input-box">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="" placeholder="Enter password">
                        <span class="errors"><?php echo $errors["password"] ?? ""; ?></span>
                    </div>

                    <div class="input-box">
                        <label for="cpassword">Confirm Password</label>
                        <input type="password" name="cpassword" id="" placeholder="Repeat password">
                        <span class="errors"><?php echo $errors["cpassword"] ?? ""; ?></span>
                    </div>
 
                </div>

                    <div>
                    <br><br><label for="profilepicture">Profile Picture</label><br>
                    <input type="file" name="file" required/>
                    <span class="errors"><?php echo $errors["file"] ?? ""; ?></span>
                    </div>

                <p style="position:relative; left: 370px; margin-top: 10px; color: #333; font-weight: 200;">Already Registered?. <a style="color: #333; text-decoration: underline; font-weight: 600;" href="login.php">Login Here</a></p>
                <button type="submit" name="btn">Register</div>
            </form>    
        </section>        
        