<?php include('./layouts/navbar.php'); ?>

<?php
    if(!isset($_SESSION['utype'])){       
?>

<main>
            <?php 
                if(isset($_GET['err'])){
            ?>
                <div class="alert alert-danger" role="alert">
                    Oops! Something went wrong.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php
                }
            ?>
            <?php 
                if(isset($_GET['successsignup'])){
            ?>
                <div class="alert alert-success" role="alert">
                    Successfully registered. Please Login!!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php
                }
            ?>
    <div class="container container-flui col-md-12 row mt-4">
    <!-- jumbotron start -->
    <div class="jumbotron col-md">
            <h1 class="display-4 center">Login to Explore the world of FoodShala</h1>
            <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
            <hr class="my-4">
            
                <a class="btn btn-primary btn-lg" href="#restrologinform" onClick="showRestroLogin()" role="button">Restaurant</a>
                <a class="btn btn-primary btn-lg" href="#userloginform" onClick="showUserLogin()" role="button">User</a>
                <br>
                <small>Haven't registered yet? <a href="signup.php">Sign Up</a></small>
  
        </div>
    <!-- jumbotron ends -->


    <div class="container-fluid col-md-12 row" id="modal">
    
        <!--User Login form start  -->
        <div class="container card col-md pb-4 d-none" id="userloginform">
            
            <div class="row mx-auto pt-4 pb-4">
                
                    <h3>User Login</h3>
                    
            </div>
                <form action="./config/function.php" method="post">
                    <div class="form-group">
                        <label for="ulemail">Email address</label>
                        <input type="email" class="form-control" id="ulemail" name="ulemail" aria-describedby="emailHelp" required>
                        <small id="emailHelp" class="form-text text-muted">Enter email id used during registration.</small>
                    </div>
                    <div class="form-group">
                        <label for="ulpassword">Password</label>
                        <input type="password" class="form-control" id="ulpassword" name="ulpassword" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary" name="ulogin">Submit</button>
                </form>
        </div>
        
        <!--User Login form end  -->

        <!--Restro Login form start  -->
        <div class="container card col-md pb-4 d-none" id="restrologinform">
            
            <div class="row mx-auto pt-4 pb-4">
                
                    <h3>Restaurant Login</h3>
                
            </div>
                <form action="./config/function.php" method="post">
                    <div class="form-group">
                        <label for="rlemail">Email address</label>
                        <input type="email" class="form-control" id="rlemail" name="rlemail" aria-describedby="emailHelp" required>
                        <small id="emailHelp" class="form-text text-muted">Enter email id used during registration.</small>
                    </div>
                    <div class="form-group">
                        <label for="rlpassword">Password</label>
                        <input type="password" class="form-control" id="rlpassword" name="rlpassword" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary" name="rlogin">Submit</button>
                </form>
            </div>
            
        </div>
        <!--Restro Login form end  -->
    </div>
</div>
</main>
<?php
    } else {
        header("Location: index.php");
    }
?>


<script>
    var url = new URL(document.URL);
    // get access to URLSearchParams object
    var search_params = url.searchParams; 
    var formType = search_params.get('id');
    var topic = search_params.get('topic');
    // alert("id = "+id+" topic = "+topic);

            function showUserLogin(){
                let userForm = document.getElementById('userloginform');
                let restroForm = document.getElementById('restrologinform');
                let modal = document.getElementById('modal');
                
                modal.classList.remove("col-md-12");
                modal.classList.add("col-md-6");
                userForm.classList.remove("d-none");
                restroForm.classList.add("d-none");
            }

            function showRestroLogin(){
                let userForm = document.getElementById('userloginform');
                let restroForm = document.getElementById('restrologinform');
                let modal = document.getElementById('modal');

                modal.classList.remove("col-md-12");
                modal.classList.add("col-md-6");
                userForm.classList.add("d-none");
                restroForm.classList.remove("d-none");
            }


</script>

<?php include('./layouts/footer.php'); ?>