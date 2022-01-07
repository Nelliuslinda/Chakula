<?php include("../path.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Section - Manage Users</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/admin.css">
    <link rel="stylesheet" href="../assets/css/admin1.css">
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
            <img src="../assets/Images/chakula.png" alt="logo">
            <a href="">
                <i class="fa fa-user"> Admin</i>
            </a>
            <ul>
                <li><a href="#" class="logout">Log Out</a></li>
            </ul>
             
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
                    <h1>Dashboard</h1>

                    <div class="col-4" >
                        <h1>5</h1>
                        <br>
                        Orders
                    </div>

                    <div class="col-4" >
                        <h1>2</h1>
                        <br>
                        Users
                    </div>

                    <div class="col-4" >
                        <h1>5</h1>
                        <br>
                        Payments
                    </div>

                    <div class="col-4" >
                        <h1>2</h1>
                        <br>
                        Admins
                    </div>

                    <div class="clearfix"></div>
                
            </div>
        </div>
    </section>
   
    
</body>
</html>
