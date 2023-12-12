<?php
    include("config.php");

    if (isset($_POST['post-dmb'])){
        $b_id = $_POST['b_id'];
        $m_id = $_POST['movie'];

        $sql = "INSERT INTO detail_bioskop_movies (Bioskop_B_ID, Movies_M_ID) 
            VALUE ('$b_id', '$m_id')";

        $query = mysqli_query($db, $sql);

        if ($query){
            header('Location: theatre.php?status=berhasil');
        } else {
            header('Location: theatre.php?status=gagal');
        }
        
        
    } else{
        die("Akses dilarang...");
    }
?>