<?php
    include("config.php");
    session_start();
    $status = 0;
    if (isset($_SESSION["id_user"])){
      $status = 1;
      $id = $_SESSION["id_user"];
      $role = $_SESSION["role"];

      $sql = "SELECT U_Name FROM user where U_ID = '$id'";
      $result = $db->query($sql);

      // Mengambil data dari hasil query
      $row = $result->fetch_assoc();

      if ($role == "admn") { $status = 2; }
    }
    
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./source/style-tiket.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="navbar">
      <div class="container-fluid">
        <div class="mx-1" style="height: 40px; width: 40px; border-radius: 50%; background-image: url(./source/images/smooth.png); background-size: cover;">
        </div>
        <a class="navbar-brand mx-1" href="index.php" style="font-weight: bolder;">Smooth Brains</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse navend2" id="navbarSupportedContent">
          <div class="w-100"></div>
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 nav-end">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="show.php">Movies</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="theatre.php">Bioskop</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" style="width:max-content !important;" href="tiket.php">Tiket Anda</a>
            </li>
            <li class="nav-item">
              <?php  
                if ($status == 1 or $status == 2){
                  echo '<a class="nav-link" href="authenticate.php">Logout</a>';
                } else {
                  echo '<a class="nav-link" href="authenticate.php">Login</a>';
                }
              ?>
            </li>
            <?php  
              if ($status == 1 or $status == 2){
                echo '<li class="nav-item"><a class="nav-link" href="#" style="color:white !important;">' . $row["U_Name"] . '</a></li>';
              }   
            ?>
          </ul>
          
        </div>
      </div>
    </nav>
    
    <div class="p-lg-5 p-1 tiketcontainer">
        <?php 
          if($status == 1){
            $result = mysqli_query($db, "SELECT * FROM Transaksi, Movies, Theatre, user where User_U_ID = $id and transaksi.Movies_M_ID = M_ID and Theatre_T_ID = T_ID and User_U_ID = U_ID");

            while($res = mysqli_fetch_assoc($result)){
              echo '
              <div class="row p-2 m-5 tiket_item">
                <div class="col col-lg-4 col-sm-12 col-12 text-center tiket-img">
                  <img src="./source/images/ticket.png" alt="" style="max-height: 300px;">
                </div>
                <div class="col col-lg-8 col-sm-12 col-12 d-flex justify-content-between gap-3 align-items-center px-5 flex-wrap" style="">
                  <div class="">
                    <h2>CINEMA</h2>
                    <h2 style="font-weight:lighter;">TICKET</h2>
                    <h5>User : '.$res['U_Name'].'</h5>
                    <div class="inner-tiket">
                      <p>Tanggal beli : '.$res['TR_Tglbeli'].'</p>
                      <p>Jumlah kursi : '.$res['TR_Num_of_tickets'].'</p>
                      <p>Metode Bayar : '.$res['TR_MetodeBayar'].'</p>
                    </div>
                    <p>'.$res['M_Title'].' | '.$res['T_Name'].' | tanggal</p>
                    <p>⭐ 5.0</p>
                  </div>
                  <img src="./source/images/qr-code.png" alt="" style="max-height: 250px; background-color:white;">
                </div>
              </div>
              ';
            }
          }else if($status == 2){
            $result = mysqli_query($db, "SELECT * FROM Transaksi, Movies, Theatre, user where transaksi.Movies_M_ID = M_ID and Theatre_T_ID = T_ID and User_U_ID = U_ID");

            while($res = mysqli_fetch_assoc($result)){
              echo '
              <div class="row p-2 m-5 tiket_item">
                <div class="col col-lg-4 col-sm-12 col-12 text-center tiket-img">
                  <img src="./source/images/ticket.png" alt="" style="max-height: 300px;">
                </div>
                <div class="col col-lg-8 col-sm-12 col-12 d-flex justify-content-between gap-3 align-items-center px-5 flex-wrap" style="">
                  <div class="">
                    <h2>CINEMA</h2>
                    <h2 style="font-weight:lighter;">TICKET</h2>
                    <h5>User : '.$res['U_Name'].'</h5>
                    <div class="inner-tiket">
                      <p>Tanggal beli : '.$res['TR_Tglbeli'].'</p>
                      <p>Jumlah kursi : '.$res['TR_Num_of_tickets'].'</p>
                      <p>Metode Bayar : '.$res['TR_MetodeBayar'].'</p>
                    </div>
                    <p>'.$res['M_Title'].' | '.$res['T_Name'].' | tanggal</p>
                    <p>⭐ 5.0</p>
                  </div>
                  <img src="./source/images/qr-code.png" alt="" style="max-height: 250px; background-color:white;">
                </div>
              </div>
              ';
            }
          }
        
        ?>

        

        
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
      var prevScrollpos = window.pageYOffset;
      window.onscroll = function() {
      var currentScrollPos = window.pageYOffset;
        if (prevScrollpos > currentScrollPos) {
          document.getElementById("navbar").style.top = "0";
        } else {
          document.getElementById("navbar").style.top = "-60px";
        }
        prevScrollpos = currentScrollPos;
      }
    </script>
  </body>
</html>