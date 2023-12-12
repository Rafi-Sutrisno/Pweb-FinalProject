<?php
    include("config.php");
    
    if (isset($_POST['login'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM user WHERE U_Email = '$email' AND U_Password = '$password'";
        $result = mysqli_query($db, $sql);
        $user = mysqli_fetch_array($result);
        
        if (mysqli_num_rows($result) == 1){
            session_start();
            $_SESSION["id_user"] = $user['U_ID'];
            $_SESSION["role"] = $user['U_Role'];
            
            header('Location: index.php');
        } else {
            header('Location: authenticate.php?status=gagal');
        }

    }

?>