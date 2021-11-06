<?php
    include('./config/db_config.php');
if(isset($_POST['idelete'])){
        $cart_item_id=mysqli_real_escape_string($conn,$_POST['cid']);
        
        $delete_from_cart_query = "delete from cart_items where cid = ".$cart_item_id;
        echo $delete_from_cart_query;
        $delete_from_cart_query_res=mysqli_query($conn,$delete_from_cart_query);

        if($delete_from_cart_query_res){
            header("Location: cart.php?success");
            exit;
            
        } else {
            header("Location: cart.php?failed");
            exit;
  
        }
    }
?>