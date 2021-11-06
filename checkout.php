<?php
    include('./config/db_config.php');
if(isset($_POST['checkout'])){
      
        $checkout_query = "UPDATE cart_items SET status = 'completed' WHERE uid=".$_SESSION['uid'];
        echo $checkout_query;
        $checkout_query_res=mysqli_query($conn,$checkout_query);

        if($checkout_query_res){
            header("Location: cart.php?checkout_success");
            exit;
            
        } else {
            header("Location: cart.php?checkout_failed");
            exit;
  
        }
    }
?>