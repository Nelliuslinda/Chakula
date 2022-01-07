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
    <link rel="stylesheet" href="../Food Website/assets/css/contact.css">
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
      <h1>Contact Us</h1>
  <!--Contact us end--> 
  <section class="location">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.8438189585736!2d36.80029871400689!3d-1.266371535960127!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f1706b7b14c4d%3A0x16c3504a474d7d3d!2sOracle%20Building!5e0!3m2!1sen!2ske!4v1628517867391!5m2!1sen!2ske" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
  </section>  
  
  <section class="contact-us">
        <div class="contact-row">
            <div class="contact-col">
                <div>
                <i class="fa fa-home"></i>
                <span>
                    <h5>Oracle building, Westlands</h5>
                    <p>206 Chiromo Rd, Nairobi</p>
                </span>
                </div>

                <div>
                <i class="fa fa-phone"></i>
                <span>
                    <h5>+254 722 2020 20</h5>
                    <p>Monday to Saturay, 9AM to 4PM </p>
                </span>
                </div>

                <div>
                <i class="fa fa-envelope"></i>
                <span>
                    <h5>info@chakula.com</h5>
                    <p>Email us your query </p>
                </span>
                </div>
            </div>
            
            <div class="contact-col">
                <form action="" method="post">
                <input type="text" placeholder="Enter your name" required>
                <input type="email" placeholder="Enter your email address" required>
                <input type="text" placeholder="Subject" required>
                <textarea name="" rows="8" placeholder="Message" required></textarea>
                <button type="submit" class="btn-1">Send Message</button>
                </form>
                
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
        </div>
        <p>Copyright <i class="fa fa-copyright"></i> 2019-2021 by Chakula. All Rights Reserved</p>
    </section>
</body>
</html>