<?php
    include("config.php");

    if (isset($_POST['post-theatre'])){
        $name = $_POST['nama'];
        $tipe = $_POST['tipe'];
        $seats = $_POST['seats'];
        $price = $_POST['price'];
        $m_id = $_POST['movies-id'];
        $b_id = $_POST['b_id'];

        $sql = "INSERT INTO theatre (T_Name, T_Type, T_Num_of_seat, T_Price, Movies_M_ID, Bioskop_B_ID) 
            VALUE ('$name', '$tipe', '$seats', '$price', '$m_id', '$b_id')";

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