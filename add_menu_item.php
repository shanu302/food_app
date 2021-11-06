<?php
    include('./layouts/navbar.php');
?>
<?php
    if(isset($_SESSION['rid']) && $_SESSION['utype']=="restro"){
?>

<main>
    <div class="container container-fluid col-md-12 row mt-4">
        <div class="jumbotron col-md-6">
            <h1 class="display-4 center">Add New Item to your Menu.</h1>
            <p class="lead">We'll try to put limelight on your food ;).</p>
            <hr class="my-4">
            
        </div>
    

    <!-- form start -->
    <div class="container-fluid col-md-6">
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
            if(isset($_GET['success'])){
        ?>
            <div class="alert alert-success" role="alert">
                Item Added successfully
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>   
        <?php
            }
        ?>
        
        
    <div class="container card col-md pb-4 ">
            <div class="row mx-auto pt-4 pb-4">           
                <h3>Add New Item to your Menu</h3>
            </div>
                <form action="./config/function.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="iname">Item Name</label>
                        <input type="text" class="form-control" id="iname" name="iname" required>
                    </div>
 
                    <div class="form-group">
                        <label for="iprice">Price(in INR)</label>
                        <input type="text" class="form-control" id="iprice" name="iprice" required>
                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="ivegradio" name="ivegradio" 
                            value="yes" class="custom-control-input" required>
                            <label class="custom-control-label" for="ivegradio">Veg Food</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="inonvegradio" name="ivegradio"
                            value="no" class="custom-control-input" required>
                            <label class="custom-control-label" for="inonvegradio">Non-Veg Food</label>
                        </div>
                    </div>
                    <div class="form-group custom-file mb-2">
                        <input type="file" class="custom-file-input" id="iimage" name="iimage" onchange="return fileValidation()" required>
                        <label class="custom-file-label" for="iimage">Choose Item Image</label>
                        <small>only image (jpeg,jpg,png) formats are allowed</small>
                    </div>
                    
                        <div id="imagePreview" class="container form-group"></div>
                    
                    
                    
                    <button type="submit" class="btn btn-success" name="iadd_item">Add Item</button>
                </form>
        </div>
    </div>
    <!-- form end -->
    </div>
</main>
<?php
    }
    else{
        header("Location: index.php");
    }
?>
<script src="./assets/js/validateImage.js"></script>
<?php
    include('./layouts/footer.php');
?>