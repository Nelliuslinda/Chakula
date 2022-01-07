<?php

function validatePhoto($photo){
    
   $errors = array();

        $existingPhoto = selectOne('food',['foodname'=>$photo['foodname']]);
        if($existingPhoto){
            if (isset($photo['update-photo']) && $existingPhoto['id'] != $photo['id']){
                array_push($errors, 'Food Item already exists');
            }

            if (isset($photo['add-photo'])) {
                array_push($errors, 'Food Item already exists');
            }
            
        }

    return $errors;
}

?>