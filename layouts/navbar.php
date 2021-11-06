<?php 
    include('./config/db_config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#68c3d1">
    <meta name="author" content="Utkarsh Singh">
    <meta name="description" content="FoodShala">
    <meta name="keywords" content="foodshala, utkarsh, utkarsh1999, internshala, utkarsh singh, restaurants">
    <title>FoodShala</title>
    
    <!-- bootstrap links -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- fontawesome kit -->
    <script src="https://kit.fontawesome.com/a9a97d4e6d.js" crossorigin="anonymous"></script>

    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- custom css -->
    <link rel="stylesheet" href="styles/index.css">

</head>
<body>
    <!-- navbar -->
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">Foodshala</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">MENU <span class="sr-only">(current)</span></a>
      </li>
      <?php 
        if(isset($_SESSION['utype']) && $_SESSION['utype']=="user"){
          
          // code to fetch cart item count
          $cart_item_count = "select count(*) as itemCount from cart_items where status = 'payment pending' AND uid=".$_SESSION['uid'];
          $cart_item_count_res = mysqli_query($conn,$cart_item_count);
          $cart_item_count_row = mysqli_fetch_assoc($cart_item_count_res);
          ?>
          
      <li class="nav-item">
        <a class="nav-link" href="cart.php">
        <i class="fas fa-shopping-cart"></i> CART <span class="badge badge-primary">
          <?=$cart_item_count_row['itemCount'] ?>  
        </span>
        </a>
      </li>
      <?php
        } else {
          ?>
      <li class="nav-item">
        <a class="nav-link" href="" onclick="showAlert();"><i class="fas fa-shopping-cart"></i>CART</a>
        
      </li>

          <?php
        }
        if(isset($_SESSION['utype']) && ($_SESSION['utype']=="restro")){
          ?>
      
      <li class="nav-item">
        <a class="nav-link" href="add_menu_item.php"><i class="fas fa-plus-circle"></i>Add</a>
      </li>
      <?php
        }
      ?>
    </ul>
    <div class=" my-2 my-lg-0 row">
      <ul class="navbar-nav">
        <?php 
          if(!isset($_SESSION['utype'])){
            ?>
            
       <li><a href="login.php" class="nav-link"><i class="fas fa-sign-in-alt"></i>LogIn</a></li>
       <li><a href="signup.php" class="nav-link"><i class="fas fa-user-plus"></i>Sign Up</a></li> 
       <?php
          }
          else{
            ?>
            
            <li><a href="logout.php" class="nav-link"><i class="fas fa-sign-out-alt"></i>LogOut</a></li>     
            <?php
              }
            ?>
      </ul>
    

    
</div>
  </div>
</nav>

  
<!-- <div class="container container-fluid row">
<div class="alert alert-danger col-md-6" role="alert">
  A simple danger alert—check it out!
</div>
</div> -->

    <!-- navbar ends -->