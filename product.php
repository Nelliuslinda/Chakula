<?php include("path.php");?>

<?php include(ROOT_PATH . "/app/controllers/photos.php");

if (isset($_GET['id'])) {
    // Prepare statement and execute, prevents SQL injection
    $stmt = $pdo->prepare('SELECT * FROM food WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    // Fetch the product from the database and return the result as an Array
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    // Check if the product exists (array is not empty)
    if (!$product) {
        // Simple error to display if the id for the product doesn't exists (array is empty)
        exit('Product does not exist!');
    }
} else {
    // Simple error to display if the id wasn't specified
    exit('Product does not exist!');
}

?>
<!DOCTYPE html>
<html lang="en">
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

</head>
<body>
   
    <!--Above the fold-->
    <section class="header">
        <!--Navigation bar start-->
        <nav>
            <img src="../Food Website/assets/Images/chakula.png" alt="logo">
             <div class="nav-links">
                <ul>
                    <li><a href="<?php echo BASE_URL . '/index.php'?>">HOME</a></li>
                    <li><a href="<?php echo BASE_URL . '/about.php'?>">ABOUT</a></li>
                    <li><a href="<?php echo BASE_URL . '/shop.php'?>">SHOP</a></li>
                    <li><a href="<?php echo BASE_URL . '/cart.php'?>">CART</a></li>
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
        <!--Navigation bar end-->
      
     
            <?php include(ROOT_PATH . "/includes/messages.php")?>
               

    </section>
   
    <!--Products-->
    <div class="small-container">
        
        <div class="product-row row-2">
            <h2>All Products</h2>
            <select name="" id="">
                <option value="">All Products</option>
                <option value="">Sort by Price</option>
                <option value="">Sort by Popularity</option>
                <option value="">Sort by Rating</option>
            </select>
        </div>
        
        <div class="product-row">
            <?php foreach($photos as $photo):?>
                <div class="col-4">
                <img src="<?php echo BASE_URL . '/assets/Images' . $photo['image']?>" alt="">
                <h4><?php echo $photo['foodname']?></h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i> 
                </div>
                <p><?php echo html_entity_decode(substr($photo['description'],0,150))?></p>
                <p>Kshs.<?php echo $photo['price']?></p>
                <form action="shop.php?page=cart" method="post">
                    <input type="number" name="quantity" value="1" min="1" max="<?=$photo['quantity']?>" placeholder="Quantity" required>
                    <input type="hidden" name="id" value="<?=$photo['id']?>">
                    <input type="submit" value="Add To Cart">
                </form>
                
                
                            
                
            </div>
            
            <?php endforeach;?>

            <!-- <div class="col-4">
                <img src="../Food Website/assets/Images/mgg-vitchakorn-IiZ2Gqxm5Pg-unsplash.jpg" alt="">
                <h4>Food 1</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i> 
                </div>
                <p>Ksh. 300</p>
            </div>

            <div class="col-4">
                <img src="../Food Website/assets/Images/mgg-vitchakorn-IiZ2Gqxm5Pg-unsplash.jpg" alt="">
                <h4>Food 1</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i> 
                </div>
                <p>Ksh. 300</p>
            </div> -->
        </div>
    </div>

    <div class="page-btn">
        <span>1</span>
        <span>2</span>
        <span>3</span>
        <span>4</span>
        <span>&#8594</span>
    </div>        
 

   <!--Footer-->

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