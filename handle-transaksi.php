<?php
    include("config.php");

    if (isset($_POST['post-transaksi'])){
        $t_name = $_POST['t_name'];
        $theatreType = $_POST['theatreType'];
        $t_price = $_POST['t_price'];
        $b_name = $_POST['b_name'];
        $ci_name = $_POST['ci_name'];
        $numOfTicket = $_POST['numOfTicket'];
        $payMethod = $_POST['payMethod'];
        $totalPrice = $_POST['totalPrice'];
        $u_id = $_POST['u_id'];
        $m_id = $_POST['m_id'];

        $timestamp = time();
        $releasedate = gmdate('Y-m-d', $timestamp);

        $getT_ID = "SELECT * from theatre, bioskop where Bioskop_B_ID = B_ID and T_Type = '$theatreType' and T_Name = '$t_name' AND Movies_M_ID='$m_id'";
        $resT_ID = $db->query($getT_ID);

        // Mengambil data dari hasil query
        $row = $resT_ID->fetch_assoc();
        $t_id = $row['T_ID'];

        
        $sql = "INSERT INTO transaksi (TR_MetodeBayar, TR_Tglbeli, TR_Num_of_tickets, Movies_M_ID, Theatre_T_ID, User_U_ID) 
            VALUE ('$payMethod', '$releasedate', '$numOfTicket', '$m_id', '$t_id', '$u_id')";

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