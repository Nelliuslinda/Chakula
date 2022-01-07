<?php

include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/validateUser.php");
$table = 'register';

$users = selectAll($table);

$errors = array();
$id = '';
$admin = '';
$email = '';
$firstname = '';
$lastname = '';
$username = '';
$password = '';



function loginUser($user){
    $_SESSION['UserID'] = $user['UserID'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['Admin'] = $user['Admin'];
    $_SESSION['message'] = 'You have succefully logged in';
    $_SESSION['type'] = 'success';

    if ($_SESSION['Admin']) {
      header('location:' . BASE_URL . '/admin/dashboard.php');
    }else{
      header('location:' . BASE_URL . '/index.php');
    }
    exit();
}

//register.php
if(isset($_POST['register-btn']) || isset($_POST['create-admin'])){ 
     $errors = validateUser($_POST);
    
     if(count($errors)===0){
        unset($_POST['register-btn'],$_POST['create-admin']);
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
        if (isset($_POST['Admin'])) {
          $_POST['Admin']=1;
          $user_id = create($table, $_POST);
          $_SESSION['message'] = "Admin user created successfully";
          $_SESSION['type'] ="success";
          header('location:' . BASE_URL . '/admin/users/index.php');
          exit();
        } else {
          $_POST['Admin']=0;
          $user_id = create($table, $_POST);
          $user = selectOne($table, ['UserID'=>$user_id]);
          loginUser($user); 
        }        
      } 
}

//login.php
if(isset($_POST['login-btn'])){
  $errors = validateLogin($_POST);

  if (count($errors)===0) {
      $user = selectOne($table,['username'=>$_POST['username']]);

      if ($user && password_verify($_POST['password'], $user['password'])) {
         //log in user
        loginUser($user);
      } else {
        array_push($errors, 'Wrong credentials');
      }      
  }
}

if (isset($_POST['update-user'])) {
  $errors = validateUser($_POST);
    
     if(count($errors)===0){
       $id = $_POST['UserID'];
        unset($_POST['update-user'], $_POST['UserID']);
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
        
          $_POST['Admin']= isset($_POST['Admin']) ? 1 : 0;
          $user_id = update($table, $id ,$_POST);
          $_SESSION['message'] = "Admin user created successfully";
          $_SESSION['type'] ="success";
          header('location:' . BASE_URL . '/admin/users/index.php');
          exit();
               
      } 
}

//Update
if (isset($_GET['id'])) {
  $user = selectOne($table,['UserID' => $_GET['id']]);

  $id = $user['UserID'];
  $admin = isset($user['Admin']) ? 1 : 0;
  $email = $user['email'];
  $firstname = $user['firstname'];
  $lastname = $user['lastname'];
  $username = $user['username'];
  $password = $user['password'];

}

//Delete admin
// if(isset($_GET['delete_id'])){
//   $u_id = $_GET['delete_id'];
//   $count = delete($table, $u_id);
//   $_SESSION['message'] = 'Admin user deleted successfully';
//   $_SESSION['type']='success';
//   header('location: ' . BASE_URL . '/admin/user/index.php');
//   exit();
// }
if(isset($_GET['del_id'])){
  $id = $_GET['del_id'];
  $count = delete($table, $id);
  $_SESSION['message'] = 'Topic deleted successfully';
  $_SESSION['type']='success';
  header('location: ' . BASE_URL . '/admin/topics/index.php');
  exit();
}



?>