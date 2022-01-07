<?php include("../../path.php");?>
<?php include(ROOT_PATH . "/app/controllers/users.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Section - Edit Users</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/admin.css">
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
            <img src="../../assets/Images/chakula.png" alt="logo">
            <?php if(isset($_SESSION['username'])): ?>
            <a href="">
                <i class="fa fa-user"> 
                    <?php echo $_SESSION['username']; ?>
                </i>
            </a>
            <ul>
                <li><a href="<?php echo BASE_URL . '/logout.php' ?>" class="logout">Log Out</a></li>
            </ul>
            <?php endif; ?> 
         </nav>
        <!--Navigation bar end-->

        <!--Admin Page Wrapper-->
        <div class="admin-wrapper">
            
            <!--Left SideBar-->
            <div class="left-sidebar">
            <ul>
            <li><a href="../admin/users/index.php">Manage Users</a></li>
                    <li><a href="../admin/photos/index.php">Manage Food Items</a></li>
                    <li><a href="../dashboard.php">Dashboard</a></li>
                </ul>
            </div>
          
            <!--Admin SideBar-->
            <div class="admin-sidebar">
                <div class="btn-1">
                    <a href="create.php" class="call-action-btn">Add Users</a>
                    <a href="index.php" class="call-action-btn">Manage Users</a>
                </div>

                <div class="content">
                    <h2 class="page-title">Edit Users</h2>
                    
                    <form action="edit.php" method="POST">
                    <input type="hidden" name="UserID" value=<?php echo $id; ?> >   
                    <div>
                        <?php if(isset($admin) && $admin == 1): ?>
                            <label>
                              <input type="checkbox" name="Admin" checked>  
                            Admin
                            </label>
                        <?php else: ?>   
                            <label>
                              <input type="checkbox" name="Admin">  
                            Admin
                            </label>
                        <?php endif; ?>   
                        </div>
                        <div>
                            <label>Email</label>
                        <input type="email" name="email" value=<?php echo $email; ?> placeholder="Email"> 
                        </div>
                        <div>
                            <label>First Name </label>
                        <input type="text" name="firstname" value=<?php echo $firstname; ?> placeholder="First Name">
                        </div>
                        <div>
                            <label>Last Name </label>
                        <input type="text" name="lastname" value=<?php echo $lastname; ?> placeholder="Last Name">
                        </div>
                        <div>
                            <label>Username </label>
                            <input type="text" name="username" value=<?php echo $username; ?> placeholder="Username">
                        </div>
                        <div>
                            <label>Password</label>
                            <input type="password" name="password" value=<?php echo $password; ?> placeholder="Password">
                        </div>
                      
                       
                        <div>
                            <button type="submit" name="update-user" class="call-action-btn">Edit User</button>
                        </div>
                        
                        
                    </form>
                </div>
                
            </div>
        </div>
    
        
        <script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/ckeditor.js"></script>
        <script src="../../assets/js/script.js"></script>
       
    </section>
   
    
</body>
</html>