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
      
     
        <?php include(ROOT_PATH . "/includes/messages.php")?>
               

        <!--Headline and subheadline-->
        <div class="text-box"> 
            <h1>We are all about food</h1>
            <p>Want a quick meal that can be delivered in 15 minutes? Look no further<br> Right here at Chakula, we strive at making your experience a 10/10. Sit back, relax and order your favourite meal. 
            </p>

        <!--Call to action button-->
            <a href="about.php" class="call-action-btn">Visit Us To Know More</a>
        </div>
    </section>
   
    <!--Secondary Content-->
    <section class="secondary-content">
        <div class="highlights">
        <h1>Introducing Food Photography</h1>
        <p>Are you an aspiring food photographer looking for an audience to share your pieces? Send in your photographs and get an opportunity to buid your career in photography</p>
        <br>
        <a href="upload.html" class="call-action-btn">Get Involved Today</a>
        </div>

    </section>

    <section class="testimonials">
        <h1>What Our Users Say</h1>
        <div class="testimonial-row">
            
            <div class="testimonial-col-1">
             <img src="../Food Website/assets/Images/istockphoto-1007763808-612x612.jpg" alt="John">
                <div>
                    <p>"Chakula is such an amazing website, They have amazing services"</p>
                    <h3>John, '23'</h3>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>    
            </div>

            <div class="testimonial-col-1">
                <img src="../Food Website/assets/Images/istockphoto-1171197670-612x612.jpg" alt="Wairimu">
                <div>
                    <p>"Being such a foodie, I have found a space where I am able to order tasty food for cheap!"</p>
                    <h3>Wairimu, '40'</h3>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                </div>  
            </div>

        </div>

        <!--Social Proofs-->

        <h1>We have...</h1>
        <div class="testimonial-row">
            <div class="testimonial-col">
                <h3>1000 active subcribers</h3>
                <img src="../Food Website/assets/Images/group.png" alt="group">
                <p>Chakula has 1000 active subcribers on a monthly basis. We are able to engage with them on our different social media platforms</p>
            </div>

            <div class="testimonial-col">
                <h3>4.8 star rating</h3>
                <img src="../Food Website/assets/Images/star.png" alt="star">
                <p>The Saturday Nation Magazine rated us a 4.8 star rating on a feature on "Best Food Delivery Website for a Busy Millennial"</p>
            </div>

            <div class="testimonial-col">
                <h3>Award For Best Food Blog in 2020 </h3>
                <img src="../Food Website/assets/Images/ribbon.png" alt="prize">
                <p>Chakula was awarded the "Best Food Blog" Award in 2020 by the Global Blogger Awards.<a href="https://bloggersawards.com/" target="_blank">Read More</a></p>
            </div>

        </div>
    </section>

    <!--Additional content-->
    <section class="signup">
      <h1>Sign up for our weekly newsletter <br> and get 10% off on your first month subcription </h1>
      <a href="<?php echo BASE_URL . '/register.php'?>" class="call-action-btn">SIGN UP</a>

    </section>

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