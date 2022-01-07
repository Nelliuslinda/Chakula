<?php include("../../path.php");?>
<?php include(ROOT_PATH . "/app/controllers/photos.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Section - Add Photographs</title>
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
                    <a href="../photos/create.php" class="call-action-btn">Add Food Item</a>
                    <a href="../photos/index.php" class="call-action-btn">Manage Food Item</a>
                </div>

                <div class="content">
                    <h2 class="page-title">Manage Food Items</h2>

                    <?php include(ROOT_PATH . '/app/helpers/formErrors.php')?>
                    
                    <form action="create.php" method="post" enctype="multipart/form-data" >
                        <div>
                            <label>Name</label>
                            <input type="text" name="foodname" value="<?php echo $name?>">
                        </div>
                        <div>
                            <label>Image</label>
                            <input type="file" name="image" >
                        </div>
                        <div>
                            <label>Body</label>
                            <textarea name="description" id="body"  value="<?php echo $body?>"></textarea>
                        </div>
                        <div>
                            <label>Price</label>
                            <input type="number" name="price"  value="<?php echo $price?>" >
                        </div>
                        <div>
                            <?php if(empty($published)):?>
                           <label>
                               <input type="checkbox" name="published">
                               Publish
                           </label> 
                           <?php else:?>
                            <label>
                               <input type="checkbox" name="published" checked>
                               Publish
                           </label> 
                            <?php endif;?>
                            
                        </div>
                        <div>
                            <button type="submit" name="add-photo" class="call-action-btn">Add Food Item</button>
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