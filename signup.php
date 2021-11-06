<?php include('./layouts/navbar.php'); ?>

<main>
    <div class="container container-fluid col-md-12 row mt-4 ">
        <div class="jumbotron col-md-6">
            <h1 class="display-4 center">Register to Explore the world of FoodShala</h1>
            <p class="lead">Please remember you Email Id and Password for Login.</p>
            <hr class="my-4">
            <!-- <p class="center sticky-top">Register as:  -->
                <a class="btn btn-primary btn-lg" href="#restroform" onClick="showRestroSignUp()" role="button">Register as Restaurant</a>
                <a class="btn btn-primary btn-lg" href="#userform" onClick="showUserSignUp()" role="button">Register as User</a>
                <br>
                <small>Already registered? <a href="login.php">Login</a></small>
            <!-- </p> -->
  
        </div>
<div class="container-fluid col-md-6 row ">
    <!-- restaurant register form start -->
    <div class="container card col-md pt-4 pb-4" id="restroform">
    <div class="row mx-auto pb-4">
             <h3>Restaurant Registration</h3>
        </div>
        <form action="config/function.php" method="post">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="oname">Owner Name</label>
                    <input type="text" class="form-control" id="oname" name="oname" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="ocontact">Owner Contact Number</label>
                    <input type="text" class="form-control" id="ocontact" name="ocontact" maxlength="10" minlength="10" required>
                </div>
            </div>
            <hr>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="rname">Restaurant Name</label>
                    <input type="text" class="form-control" id="rname" name="rname" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="rcontact">Restaurant Contact Number</label>
                    <input type="text" class="form-control" id="rcontact" name="rcontact" maxlength="10" minlength="10" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="remail">Email Id</label>
                    <input type="email" class="form-control" id="remail" name="remail" placeholder="help@restro.in" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="rpassword">Password</label>
                    <input type="password" class="form-control" id="rpassword" name="rpassword" placeholder="********" minlength="7" required>
                </div>
            </div>
            
            
                <div class="form-group">
                    <label for="raddress">Restaurant Address</label>
                    <input type="text" class="form-control" id="raddress" name="raddress" required>
                </div>
            
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="rcity">City</label>
                <input type="text" class="form-control" id="rcity" name="rcity" required>
                </div>
                <div class="form-group col-md-4">
                <label for="rstate">State</label>
                <select id="rstate" class="form-control" name="rstate" required>
                
                <?php 
                    $state_fetch_query = "SELECT * FROM all_states";           
                    $res = mysqli_query($conn,$state_fetch_query);
                    while($row = mysqli_fetch_assoc($res)){
                        
                    ?>
                        <option value=<?=$row['state_name'] ?> ><?=$row['state_name'] ?></option>
                    <?php
                    }
                    ?>
               
                    
                    
                </select>
                </div>
                <div class="form-group col-md-2">
                <label for="rzip">Zip Code</label>
                <input type="text" class="form-control" id="rzip" name="rzip" required>
                </div>
            </div>
            <div class="form-group">
                <div class="form-check">
                <input class="form-check-input" type="checkbox" id="r_tnc" required>
                <label class="form-check-label" for="r_tnc">
                I agree to FoodShala's privacy policy and TnC.
                </label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="rsign">Sign in</button>  
        </form>
    </div>
    <!-- restaurant register form end -->
    <!-- user registration form -->
    <div class="container card col-md d-none" id="userform" >
        <div class="row mx-auto">
             <h3>User Registration</h3>
        </div>
        <br>
        <form action="config/function.php" method="post">
            
                <div class="form-group">
                    <label for="uname">Full Name</label>
                    <input type="text" class="form-control" id="uname" name="uname" required>
                </div>
                <div class="form-group">
                    <label for="ucontact">Contact Number</label>
                    <input type="text" class="form-control" id="ucontact" name="ucontact" maxlength="10" minlength="10" required>
                </div>
            
            <hr>
            
                <div class="form-group">
                    <label for="uemail">Email Id</label>
                    <input type="email" class="form-control" id="uemail" name="uemail" placeholder="utkarsh@gmail.com" required>
                </div>
                <div class="form-group">
                    <label for="upassword">Password</label>
                    <input type="password" class="form-control" id="upassword" name="upassword" placeholder="********" required>
                </div>
            
            
            
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="ucity">City</label>
                    <input type="text" class="form-control" id="ucity" name="ucity" required>
                </div>
            </div>
            <div class="form-group">
                <div class="form-check">
                <input class="form-check-input" type="checkbox" id="u_tnc" required>
                <label class="form-check-label" for="u_tnc">
                    I agree to FoodShala privacy policy and TnC.
                </label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="usign">Sign in</button>  
        </form>
    </div>
    <!-- user registration form ends -->
    
</div>

</div>
</main>

<!-- custom javascript -->
<script>
    function showRestroSignUp(){
        let userForm = document.getElementById('userform');
        let restroForm = document.getElementById('restroform');

        userForm.classList.add("d-none");
        restroForm.classList.remove("d-none");

    }
    
    function showUserSignUp(){
        let userForm = document.getElementById('userform');
        let restroForm = document.getElementById('restroform');

        restroForm.classList.add("d-none");
        userForm.classList.remove("d-none");
        
    }

</script>

<?php include('./layouts/footer.php'); ?>