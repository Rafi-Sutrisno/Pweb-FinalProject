<?php
    include("config.php");

    if (isset($_POST['post-bioskop'])){
        $name = $_POST['nama'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $ci_id = $_POST['city'];

        $sql = "INSERT INTO bioskop (B_Name, B_Address, B_Phone, City_CI_ID) 
            VALUE ('$name', '$address', '$phone', '$ci_id')";

        $query = mysqli_query($db, $sql);

        if ($query){
            header('Location: index.php?status=berhasil');
        } else {
            header('Location: index.php?status=gagal');
        }
        
        
    } else{
        die("Akses dilarang...");
    }
?>