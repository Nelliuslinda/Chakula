<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

session_start();
require('connect.php');

function show($value){
    echo "<pre>", print_r($value,true),"</pre>";
}

function executeQuery($sql,$data){
    global $conn;
    $stmt = $conn->prepare($sql);
    $values= array_values($data);
    $types= str_repeat('s',count($values));
    $stmt->bind_param($types, ...$values);
    $stmt->execute();
    return $stmt;
}

//Function to select all users in table
function selectAll($table, $conditions = [])
{
global $conn;
$sql = "SELECT * FROM $table";
    if(empty($conditions)){
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    }else{
 
 $i = 0;
    foreach ($conditions as $key => $value){
        if($i === 0){
            $sql = $sql." WHERE $key=?";
        }else{
            $sql = $sql." AND $key=?";
        }
        $i++;
    }


    $stmt = executeQuery($sql,$conditions);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
    
    }
}

//Function to select one user with a condition
function selectOne($table, $conditions)
{
    global $conn;
    $sql = "SELECT * FROM $table";
    
    $i = 0;
    foreach ($conditions as $key => $value){
        if($i === 0){
            $sql = $sql." WHERE $key=?";
        }else{
            $sql = $sql." AND $key=?";
        }
        $i++;
    }

    $stmt = executeQuery($sql, $conditions);
    $records = $stmt->get_result()->fetch_assoc();
    return $records;    
    
}

//Function to add a user
function create($table, $data){
    global $conn;
    $sql = "INSERT INTO $table SET ";

    $i = 0;
    foreach ($data as $key => $value){
        if($i === 0){
            $sql = $sql." $key=?";
        }else{
            $sql = $sql.", $key=?";
        }
        $i++;
    }
 

    $stmt = executeQuery($sql, $data);
    $id = $stmt->insert_id;
    return $id;
}

//Function to update a query
function update($table, $id, $data){
    global $conn;
    $sql = "UPDATE $table SET ";

    $i = 0;
    foreach ($data as $key => $value){
        if($i === 0){
            $sql = $sql." $key=?";
        }else{
            $sql = $sql.", $key=?";
        }
        $i++;
    }
    
    $stmt = executeQuery($sql, $data);
    return $stmt->affected_rows;
}

////Function for deleting 
function delete($table, $id){
    global $conn;
    $sql = "DELETE FROM $table WHERE id=?";
    
   
    $stmt = executeQuery($sql, ['id' => $id]);
    return $stmt->affected_rows;
}

//Function for deleting user
function deleteUser($table, $id){
    global $conn;
    $sql = "DELETE FROM $table WHERE UserID=?";
    
   
    $stmt = executeQuery($sql, ['UserID' => $id]);
    return $stmt->affected_rows;
}


?>

