<?php include("path.php");?>
<?php include(ROOT_PATH . "/app/database/db.php")?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Website</title>
    <link rel="stylesheet" href="../Food Website/assets/css/style.css">
    <link rel="stylesheet" href="../Food Website/assets/css/about.css">
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

     <!--Navigation bar end-->
      <h1>About Us</h1>
     
    <!--About us content-->
     <section class="about-us">
        <div class="row">
            <div class="col-1">
                <h1>Biggest Foodies In Town</h1>
                <p>Want Fried chicken for you mid-break lunch, or a nyama-choma fest for your party? Here at Chakula,
                    we pride ourselves as the number one stop-shop for all your food needs. So what aer you waiting for, order now 
                    and get free delivery!
                   
                </p>
                <a href="../Food Website/uploadreg.php" class="btn-1">Explore Now</a>
            </div>
            <div class="col-2">
                <img src="../Food Website/assets/Images/windows-hNiNxhUfCfQ-unsplash.jpg" alt="">
            </div>
        </div>
     </section>      
               

       

        
    </section>
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