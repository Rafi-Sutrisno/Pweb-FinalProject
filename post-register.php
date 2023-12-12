<?php
    include("config.php");

    $name = $_POST['myName'];
    $email = $_POST['myEmail'];
    $password = $_POST['myPassword'];

    $sql = "INSERT INTO user (U_Name, U_Email, U_Password, U_role) 
            VALUE ('$name', '$email', '$password', 'user')";

    $query = mysqli_query($db, $sql);

    $response = [];

    if ($query){
        $response['status'] = true;
    } else {
        $response['status'] = false;
    }
    
    echo json_encode($response);
?>