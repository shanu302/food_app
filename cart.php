<?php
    include('./layouts/navbar.php');
?>
<main>
    <div class="container container-fluid col-md-12 row mt-4">
        <div class="container col-md-8">  
        
        <?php
         if(isset($_GET['checkout_success'])){
        ?>
            <div class="alert alert-success" role="alert">
                yayay! Order placed successfully. 
                
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php
            }
        ?>

        <?php
         if(isset($_GET['checkout_failed'])){
        ?>
            <div class="alert alert-danger" role="alert">
                Ahh crap! Something went wrong. 
                
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
                Item successfully removed from cart. 
                
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php
            }
        ?>

        <?php
         if(isset($_GET['failed'])){
        ?>
            <div class="alert alert-danger" role="alert">
                Oops! Something went wrong. Unable to remove item from cart. 
                
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php
            }
        ?>
            
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Veg</th>
                    <th scope="col">Restaurant</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                    
                    </tr>
                </thead>
                <tbody>
                <?php

                    // total cost
                        $total_cost=0;

                    $fetch_cart_query = "select c.cid as cid, i.name as item_name, i.is_veg as is_veg, i.price as price, r.name as restro_name from cart_items c, food_items i, restaurant r where c.uid=".$_SESSION['uid']." AND c.iid=i.iid AND i.rid=r.rid AND c.status='payment pending'";
                    // echo $fetch_cart_query;
                    $fetch_cart_query_res=mysqli_query($conn,$fetch_cart_query);
                    // $fetch_cart_query_row=mysqli_fetch_assoc($res);
                    
                    while($fetch_cart_query_row = mysqli_fetch_assoc($fetch_cart_query_res)){
                        $total_cost +=$fetch_cart_query_row['price'];
                ?>
                    <tr>
                        <th scope="row">1</th>
                        <td><?=$fetch_cart_query_row['item_name'] ?></td>
                        <td><?=$fetch_cart_query_row['is_veg'] ?></td>
                        <td><?=$fetch_cart_query_row['restro_name'] ?></td>
                        
                        <td><i class="fas fa-rupee-sign"></i><?=$fetch_cart_query_row['price'] ?></td>
                        
                        <td>
                            
                            <form action="delete_item.php" method="post">
                                <input type="text" name="cid" value=<?=$fetch_cart_query_row['cid'] ?> hidden />
                                <button type="submit" class="btn btn-danger" name="idelete"><i class="far fa-trash-alt"></i>&nbsp;Remove</button>
                            </form>
                                
                        </td>
                    </tr>
                    <?php
                        } //while loop end
                    ?>  
                        
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        
                        <th scope="row" class="bg-dark text-white">Total: </th>
                        <td class="bg-dark text-white">
                            <i class="fas fa-rupee-sign"></i><?=$total_cost ?>
                        </td>
                        <td class="bg-dark text-white">
                        <?php 
                                if($total_cost!=0){
                            ?>
                            <form action="checkout.php" method="post">
                                
                                <button type="submit" class="btn btn-success" name="checkout"><i class="fas fa-shopping-bag"></i>&nbsp;Check Out</button>
                            </form>
                            <?php } ?>
                        </td>
                    </tr>  
                </tbody>

            </table>
            
         </div>


    </div>
</main>
<?php
    include('./layouts/footer.php');
?>