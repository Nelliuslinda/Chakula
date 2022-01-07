<?php

include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/validatePhoto.php");

$table = 'food';

$photos = selectAll($table);

$errors = array();
$id = '';
$name = '';
$body = '';
$price = '';
$published = '';

//Edit Function
if (isset($_GET['id'])) {
    $photo = selectOne($table, ['id' => $_GET['id']]);

    $id = $photo['id'];
    $name = $photo['foodname'];
    $body = $photo['description'];
    $price = $photo['price'];
    $published = $photo['published'];
}

//Delete
if (isset($_GET['delete_id'])) {
    $count = delete($table, $_GET['delete_id']);
    $_SESSION['message'] = "Food Item deleted succefully";
        $_SESSION['type'] = "success";
        header("location: " . BASE_URL . "/admin/photos/index.php");
        exit();
}

if (isset($_GET['published']) && isset($_GET['p_id'])) {
    $published = $_GET['published'];
    $p_id = $_GET['p_id'];

    //...update published food item
    $count = update($table, $p_id, ['published' => $published]);

    $_SESSION['message'] = "Food Item state changed succefully";
    $_SESSION['type'] = "success";
    header("location: " . BASE_URL . "/admin/photos/index.php");
    exit();
}

//Adding to the database
if (isset($_POST['add-photo'])) {
     $errors = validatePhoto($_POST);

    if(!empty($_FILES['image']['name'])){
        $image_name = time() . '_' . $_FILES['image']['name'];
        $destination = ROOT_PATH . "/assets/Images" . $image_name;

        $result = move_uploaded_file($_FILES['image']['tmp_name'],$destination);

        if ($result) {
            $_POST['image'] = $image_name;
        } else {
            array_push($errors,"Failed to upload image");
        }
        
    }else{
       array_push($errors,"Image required"); 
    }

    if (count($errors) == 0) {
        unset($_POST['add-photo']);
        $_POST['published']=isset($_POST['published']) ? 1 : 0;
        $_POST['description'] = htmlentities($_POST['description']);

        $post_id = create($table, $_POST);
        $_SESSION['message'] = "Food Item created succefully";
        $_SESSION['type'] = "success";
        header("location: " . BASE_URL . "/admin/photos/index.php");
        exit();
    }   
    
}

//Update
if (isset($_POST['update-photo'])) {
    $errors = validatePhoto($_POST);

    if(!empty($_FILES['image']['name'])){
        $image_name = time() . '_' . $_FILES['image']['name'];
        $destination = ROOT_PATH . "/assets/Images" . $image_name;

        $result = move_uploaded_file($_FILES['image']['tmp_name'],$destination);

        if ($result) {
            $_POST['image'] = $image_name;
        } else {
            array_push($errors,"Failed to upload image");
        }
        
    }else{
       array_push($errors,"Image required"); 
    }

    if (count($errors) == 0) {
        $id = $_POST['id'];
        unset($_POST['update-photo'], $_POST['id']);
        $_POST['published']=isset($_POST['published']) ? 1 : 0;
        $_POST['description'] = htmlentities($_POST['description']);

        $post_id = update($table, $id, $_POST);
        $_SESSION['message'] = "Food Item updated succefully";
        $_SESSION['type'] = "success";
        header("location: " . BASE_URL . "/admin/photos/index.php");
        exit();
    }   
}


?>