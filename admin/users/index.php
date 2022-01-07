<?php include("../../path.php");?>
<?php include(ROOT_PATH . "/app/controllers/users.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Section - Manage Users</title>
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
                    <li><a href="..photos/index.php">Manage Food Items</a></li>
                    <li><a href="../dashboard.php">Dashboard</a></li>
                </ul>
            </div>
          
            <!--Admin SideBar-->
            <div class="admin-sidebar">
                <div class="btn-1">
                    <a href="create.php" class="call-action-btn">Add Users</a>
                    <a href="index.php" class="call-action-btn">Manage Users</a>
                </div>
                <br>
                <div class="content">
                    <h2 class="page-title">Manage Users</h2>

                    
                    <table>
                        <thead>
                            <th>SN</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                           <th colspan="3">Action</th>
                        </thead>
                        <tbody>

                        <?php foreach($users as $key => $user):?>
                            <tr>
                               <td><?php echo $key + 1 ?></td>
                               <td><?php echo $user['username'] ?></td>
                               <td><?php echo $user['email'] ?></td>
                               <?php if ($user['Admin']):?>
                                <td>Admin</td>
                               <?php else: ?>
                                <td>User</td>
                               <?php endif;?>
                               <td><a href="edit.php?id=<?php echo $user['UserID'] ?>" class="edit">Edit</a></td>
                               <td><a href="index.php?del_id=<?php echo $user['UserID']; ?>" class="delete">Delete</a></td>
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