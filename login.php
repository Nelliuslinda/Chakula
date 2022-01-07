<?php include("path.php");?>
<?php include(ROOT_PATH . "/app/controllers/users.php")?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
   <link rel="stylesheet" href="../Food Website/assets/css/login.css">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <section class="loginform">
        <img src="../Food Website/assets/Images/chakula.png" alt="logo" class="logo">
        <h1>Log in to Chakula</h1>

        <!--Form Validation--> 
        <?php include(ROOT_PATH . "/app/helpers/formErrors.php")?>        

        <form action="login.php" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" name="login-btn" id="" value="Log In">

            <br>
            <p class="label_OR">OR</p>
            

            <a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i> Log in with Facebook</a><br>
            <a href="https://accounts.google.com/servicelogin" target="_blank"><i class="fa fa-google"></i> Log in with Google</a><br>

            <br>
            <div class="links">
                <a href="#">Forgot password?</a><br>
                <a href="<?php echo BASE_URL . '/register.php'?>">Don't have an account? Sign up today.</a>
            </div>
        </form>
        <br>
    </section>
</body>
</html>