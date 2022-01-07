<?php
function validateUser($user){
    
   $errors = array();

      //   $existingUser = selectOne('register',['email'=>$user['email']]);
      //   if($existingUser){
      //       array_push($errors, 'Email already exists');
      //   }

      $existingUser = selectOne('register',['email'=>$user['email']]);
        if($existingUser){
            if (isset($user['update-user']) && $existingUser['UserID'] != $user['UserID']){
               array_push($errors, 'Email already exists');
            }

            if (isset($user['create-admin'])) {
               array_push($errors, 'Email already exists');
            }
            
        }

    return $errors;
}

function validateLogin($user){
    
     $errors = array();

     if(empty($user['username'])){
        array_push($errors, 'Username is required');
     }
     if(empty($user['password'])){
        array_push($errors, 'Password is required');
     }
     
     return $errors;
}
?>