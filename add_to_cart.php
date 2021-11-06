<?php
    include('./config/db_config.php');
if(isset($_POST['add_to_cart'])){
        $item_id=mysqli_real_escape_string($conn,$_POST['iid']);
        $user_id=$_SESSION['uid'];
        $quantity=1;
        $add_to_cart_query = "insert into cart_items(uid,iid,quantity) values('".$user_id."','".$item_id."','".$quantity."')";
        echo $add_to_cart_query;
        $add_to_cart_query_res=mysqli_query($conn,$add_to_cart_query);

        if($add_to_cart_query_res){
            header("Location: index.php?item_added");
            
            exit;
        } else {
            header("Location: index.php?item_added_err");
            exit;
            
        }
    }
?>