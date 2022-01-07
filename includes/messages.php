<html>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="../Food Website/assets/css/extra.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    </head>
    <body>
        
    <?php if(isset($_SESSION['message'])):?>
            <div class="msg-<?php echo $_SESSION['type']?>">
                <li><?php echo $_SESSION['message']?></li>
                <?php
                unset($_SESSION['message']);
                unset($_SESSION['type']);
                ?>
            </div>
        <?php endif;?>
    </body>
    </html>
</html>