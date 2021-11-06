<?php
    include('./layouts/navbar.php');
?>

<main>
    <div class="jumbotron jumbotron-fluid">
        <div class="container container-fluid">
            <h1>Explore Delicious delicacies!!</h1>
        </div>
    </div>

    <?php
        if(isset($_GET['item_added'])){
    ?>
        <div class="alert alert-success" role="alert">
            Item Added to Cart Successfully. 
            <a href="cart.php" class="alert-link">View Cart</a>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php
        }
    ?>
        <?php
        if(isset($_GET['item_added_err'])){
    ?>
        <div class="alert alert-danger" role="alert">
            Oops! Something went wrong. Unable to add Item to Cart. 
            <a href="cart.php" class="alert-link">View Cart</a>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php
        }
    ?>

    
    <!-- Menu Item Card Holder start -->
    <div class="container container-fluid row">
    <?php
        $fetch_all_fooditem_query = "select * from food_items";
        $res=mysqli_query($conn,$fetch_all_fooditem_query);
        while($foodItem = mysqli_fetch_assoc($res)){
    ?>
    
    <!-- card start -->
        <div class="container col-md-4 mt-2">
            <div class="card">
                <!-- <img src="./assets/img/restro.jpg" class="card-img-top" alt="..."> -->
                <div class="card-img-top" style="background-image: url('assets/img/<?=$foodItem['image'] ?>')"></div>
                <div class="card-body">
                    <h4 class="text-capitalize">
                        <?=$foodItem['name'] ?></h4>
                        <?php 
                            
                            if($foodItem['is_veg']=="yes"){
                        ?>
                            <p class="card-text text-small"><i class="fas fa-circle veg"></i>&nbsp;Veg</p>
                        <?php 
                            } else {
                        ?>
                               <p class="card-text text-small"> <i class="fas fa-circle non-veg"></i>&nbsp;Non-Veg</p>
                        <?php
                            }
                        ?> 
                        
                    
                    <?php
                     $fetch_restroname_using_rid = "select * from restaurant where rid=".$foodItem['rid'];
                     $restroRes=mysqli_query($conn,$fetch_restroname_using_rid);
                     $restroName=mysqli_fetch_assoc($restroRes);
                    ?>
                    <small><?=$restroName['name'] ?></small>
                        <p class="card-text text-small"><?=$foodItem['price'] ?>/-</p>
                        <ul class="list-group list-group-flush">
                            <!-- <li class="list-group-item">Rs. 200/-</li> -->
                            
                            <li class="list-group-item">
                                Serve by:&nbsp;
                            <?=$restroName['name'] ?>, <?=$restroName['city'] ?></li>
                        <?php 
                            $disable="disabled";
                            $pointer="cross-pointer";
                            if((isset($_SESSION['utype']) && $_SESSION['utype']=="user")){
                                $disable=" ";
                                $pointer=" ";
                            }
                        ?>
                             
                           
                            <li class="list-group-item">
                                <form action="add_to_cart.php" method="post">
                                    <input type="text" name="iid" value=<?php echo $foodItem['iid']; ?> hidden />
                                    
                                    <?php
                                     if(!isset($_SESSION['uid'])){
                                    ?>
                                        <button type="submit" onclick="showAlert();" class="btn btn-secondary" name="add_to_cart"><i class="fas fa-cart-plus" ></i>&nbsp;Add to Cart</button>     
                                    <?php 
                                    } else {
                                        ?>
                                        <button type="submit" class="btn btn-info" name="add_to_cart"><i class="fas fa-cart-plus" ></i>&nbsp;Add to Cart</button>
                                     <?php
                                     }
                                    ?>
                                </form>
                            </li>
                        </ul>
                        
                </div>
            </div>
        </div>
        <!-- card end -->
        <?php
        }
    ?>
        

    </div>
    <!-- Menu Item Card Holder end -->
</main>

<script>
function showAlert(){
    alert("please login as user to enable this feature!!");
}
</script>

<?php
    include('./layouts/footer.php');
?>