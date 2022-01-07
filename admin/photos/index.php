<?php include("../../path.php");?>
<?php include(ROOT_PATH . "/app/controllers/photos.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Section - Manage Photos</title>
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
                <li><a href="../users/index.php">Manage Users</a></li>
                    <li><a href="../photos/index.php">Manage Food Items</a></li>
                    <li><a href="../dashboard.php">Dashboard</a></li>
                </ul>

            </div>
          
            <!--Admin SideBar-->
            <div class="admin-sidebar">
                <div class="btn-1">
                    <a href="create.php" class="call-action-btn">Add Food Item</a>
                    <a href="index.php" class="call-action-btn">Manage Food Item</a>
                </div>

                <div class="content">
                    <h2 class="page-title">Manage Food Items</h2>
                    <?php //include(ROOT_PATH . "/app/includes/messages.php");?>

                    <table>
                        <thead>
                            <th>SN</th>
                            <th>Food Name</th>
                            <th>Price</th>
                            <th colspan="3">Action</th>
                        </thead>
                        <tbody>
                            <?php foreach ($photos as $key => $photo):?>
                            <tr>
                               <td><?php echo $key + 1; ?></td>
                               <td><?php echo $photo['foodname']?></td>
                               <td><?php echo $photo['price']?></td>
                               <td><a href="edit.php?id=<?php echo $photo['id'];?>" class="edit">Edit</a></td>
                               <td><a href="edit.php?delete_id=<?php echo $photo['id'];?>" class="delete">Delete</a></td>
                               <?php if ($photo['published']):?>
                                <td><a href="edit.php?published=0&p_id=<?php echo $photo['id']?>" class="unpublish">Unpublish</a></td>
                               <?php else: ?>
                                <td><a href="edit.php?published=1&p_id=<?php echo $photo['id']?>" class="publish">Publish</a></td>
                               <?php endif;?>
                               
                           </tr> 
                            <?php endforeach;?>
                           
                           
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </section>
   
    
</body>
</html>