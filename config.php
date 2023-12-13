<?php
    $server = "localhost"; 
    $user = "pmauser";
    $password = "rafisutrisno";
    $nama_database = "movie_theatre";

    $db = mysqli_connect($server, $user, $password, $nama_database);

    if (!$db){
        die("Failed to connect to db: " . mysqli_connect_error());
    }
?>