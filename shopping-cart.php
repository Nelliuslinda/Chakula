<?php
include("path.php");   
 session_start();  
 $connect = mysqli_connect("localhost", "root", "", "chakula_database");  
 if(isset($_POST["add_to_cart"]))  
 {  
      if(isset($_SESSION["shopping_cart"]))  
      {  
           $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");  
           if(!in_array($_GET["id"], $item_array_id))  
           {  
                $count = count($_SESSION["shopping_cart"]);  
                $item_array = array(  
                     'item_id'               =>     $_GET["id"],  
                     'item_name'               =>     $_POST["hidden_name"],  
                     'item_price'          =>     $_POST["hidden_price"],  
                     'item_quantity'          =>     $_POST["quantity"]  
                );  
                $_SESSION["shopping_cart"][$count] = $item_array;  
           }  
           else  
           {  
                echo '<script>alert("Item Already Added")</script>';  
                echo '<script>window.location="shopping-cart.php"</script>';  
           }  
      }  
      else  
      {  
           $item_array = array(  
                'item_id'               =>     $_GET["id"],  
                'item_name'               =>     $_POST["hidden_name"],  
                'item_price'          =>     $_POST["hidden_price"],  
                'item_quantity'          =>     $_POST["quantity"]  
           );  
           $_SESSION["shopping_cart"][0] = $item_array;  
      }  
 }  
 if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($values["item_id"] == $_GET["id"])  
                {  
                     unset($_SESSION["shopping_cart"][$keys]);  
                     echo '<script>alert("Item Removed")</script>';  
                     echo '<script>window.location="shopping-cart.php"</script>';  
                }  
           }  
      }  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>All Products - Chakula Website</title>
            <!-- <link rel="stylesheet" href="../Food Website/assets/css/style.css"> -->
            <link rel="stylesheet" href="../Food Website/assets/css/shop.css">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">    
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           

      <nav>
            <img src="../Food Website/assets/Images/chakula.png" alt="logo">
            <div class="nav-links">
                <ul>
                    <li><a href="<?php echo BASE_URL . '/index.php'?>">HOME</a></li>
                    <li><a href="<?php echo BASE_URL . '/about.php'?>">ABOUT</a></li>
                    <li><a href="<?php echo BASE_URL . '/shopping-cart.php'?>">SHOP</a></li>
                    <li><a href="<?php echo BASE_URL . '/contact.php'?>">CONTACT</a></li>
                    <?php if(isset($_SESSION['UserID'])):?>
                        <li>    
                        <a href="#">
                            <i class="fa fa-user"></i>
                            <?php echo $_SESSION['username'];?>
                            <i class="fa fa-chevron-down" style="font-size: .8em;"></i>
                        </a>
                        <ul>
                            <?php if($_SESSION['Admin']):?>
                            <li><a href="<?php echo BASE_URL . '/admin/dashboard.php'?>">Dashboard</a></li>
                            <?php endif; ?>
                            <li><a href="<?php echo BASE_URL . '/logout.php'?>" class="logout">Logout</a></li>
                        </ul>
                    </li>
                    <?php else:?>
                        <li><a href="<?php echo BASE_URL . '/register.php'?>">SIGN UP</a></li>
                        <li><a href="<?php echo BASE_URL . '/login.php'?>">LOG IN</a></li>
                    <?php endif;?>
               </ul>
            </div>       
                
         </nav>
           <div class="container" style="width:700px;">  
                <h3 align="center">Chakula Shopping Cart</h3><br />  
                <?php  
                $query = "SELECT * FROM food ORDER BY id ASC";  
                $result = mysqli_query($connect, $query);  
                if(mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result))  
                     {  
                ?>  
                <div class="col-md-4">  
                     <form method="post" action="shopping-cart.php?action=add&id=<?php echo $row["id"]; ?>">  
                          <div align="center">  
                               <img src="<?php echo BASE_URL . '/assets/Images'. $row["image"]; ?>" class="img-responsive" /><br />  
                               <h4 class="text-info"><?php echo $row["foodname"]; ?></h4>  
                               <h4 class="text-danger">Ksh <?php echo $row["price"]; ?></h4>  
                               <input type="text" name="quantity" class="form-control" value="1" />  
                               <input type="hidden" name="hidden_name" value="<?php echo $row["foodname"]; ?>" />  
                               <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />  
                               <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />  
                          </div>  
                     </form>  
                </div>  
                <?php  
                     }  
                }  
                ?>  
                <div style="clear:both"></div>  
                <br />  
                <h3>Order Details</h3>  
                <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="40%">Item Name</th>  
                               <th width="10%">Quantity</th>  
                               <th width="20%">Price</th>  
                               <th width="15%">Total</th>  
                               <th width="5%">Action</th>  
                          </tr>  
                          <?php   
                          if(!empty($_SESSION["shopping_cart"]))  
                          {  
                               $total = 0;  
                               foreach($_SESSION["shopping_cart"] as $keys => $values)  
                               {  
                          ?>  
                          <tr>  
                               <td><?php echo $values["item_name"]; ?></td>  
                               <td><?php echo $values["item_quantity"]; ?></td>  
                               <td>Ksh <?php echo $values["item_price"]; ?></td>  
                               <td>Ksh <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>  
                               <td><a href="shopping-cart.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>  
                          </tr>  
                          <?php  
                                    $total = $total + ($values["item_quantity"] * $values["item_price"]);  
                               }  
                          ?>  
                          <tr>  
                               <td colspan="3" align="right">Total</td>  
                               <td align="right">Ksh <?php echo number_format($total, 2); ?></td>  
                               <td></td>  
                          </tr>  
                          <?php  
                          }  
                          ?>  
                     </table>  
                </div> 
                    <div>
                     <a href="https://www.mastercardconnect.com/" target="_blank"><i class="fa fa-cc-mastercard"></i> Pay with Mastercard</a><br>
                    <a href="https://usa.visa.com/pay-with-visa/checkout.html" target="_blank"><i class="fa fa-cc-visa"></i> Pay with Visa</a><br>
                    <a href="https://www.paypal.com/re/webapps/mpp/send-money-online" target="_blank"><i class="fa fa-cc-paypal"></i> Pay with Paypal</a><br>
                    <a href="https://www.safaricom.co.ke/m-pesa/lipa-na-m-pesa/m-pesa-services" target="_blank"><i class="fa fa-mobile"></i> Pay with MPESA</a><br>
               </div> 
           </div>  
           <br /> 
           <section class="contact">
        <h4>Interact With Us On</h4>
        <div class="social-icons">
            <a href="https://www.instagram.com/" target="_blank"><i class="fa fa-instagram"></i></a>
            <a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a>
            <a href="https://www.twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a>
            <a href="https://www.gmail.com/" target="_blank"><i class="fa fa-envelope-o"></i></a>
        </div>
        <p>Copyright <i class="fa fa-copyright"></i> 2019-2021 by Chakula. All Rights Reserved</p>
    </section> 
      </body>  
 </html>