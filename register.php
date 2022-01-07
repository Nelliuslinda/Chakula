<?php include("path.php");?>
<?php include(ROOT_PATH . "/app/controllers/users.php")?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../Food Website/assets/css/register.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    

    <section class="registerform">
        <img src="../Food Website/assets/Images/chakula.png" alt="logo" class="logo">
        <h1>Sign up Chakula</h1>

       <!--Form Validation--> 
        <?php include(ROOT_PATH . "/app/helpers/formErrors.php")?>        
               
        <form action="register.php" method="post">
            <input type="email" name="email" id="email"  placeholder="Email"  required>
            <input type="text" name="firstName" id="name" placeholder="First Name"  required>
            <input type="text" name="lastName" id="name"  placeholder="Last Name"  required>
            <input type="text" name="username" id="username"  placeholder="Username"  required>
            <input type="password" name="password" id="password" placeholder="Password" required>

            <a href="https://www.mastercardconnect.com/" target="_blank"><i class="fa fa-cc-mastercard"></i> Pay with Mastercard</a><br>
            <a href="https://usa.visa.com/pay-with-visa/checkout.html" target="_blank"><i class="fa fa-cc-visa"></i> Pay with Visa</a><br>
            <a href="https://www.paypal.com/re/webapps/mpp/send-money-online" target="_blank"><i class="fa fa-cc-paypal"></i> Pay with Paypal</a><br>
            <a href="https://www.safaricom.co.ke/m-pesa/lipa-na-m-pesa/m-pesa-services" target="_blank"><i class="fa fa-mobile"></i> Pay with MPESA</a><br>

            <input type="submit" name="register-btn" id="" value="Sign Up">

            <br>
            <div class="links">
               <a href="../Food Website/login.php">Have an account? Log in</a>
            </div>
            <br>
        <p>By signing up, you agree to our <span class="privacy"><a href="https://www.privacypolicies.com/our-terms-of-use/" target="_blank">Privacy Policy</a></span></p>
        </form>
        <br>
    </section>
</body>
</html>