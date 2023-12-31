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
    <link rel="stylesheet" href="./source/style-show.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-5" id="navbar">
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


    <div class="container-xxl p-4 mb-5" style="background-color: black; color: white;">
      <div class="d-flex justify-content-between align-items-center mb-5 mt-5">
        <h1>All Movies</h1>
        <?php 
        if (isset($_GET['selectedValue'])) {
          $selectedValue = $_GET['selectedValue'];
              if($selectedValue == 0){
                echo'<h4>Semua Kota</h4>';
              }else{
                $result_city = mysqli_query($db, "SELECT * FROM city where CI_ID = $selectedValue");
                $city = mysqli_fetch_assoc($result_city);
                echo'<h4>'.$city['CI_Name'].'</h4>';
              }
        }
         ?>

        <select onchange="updatePHP()" id="select-city" class="p-2 px-3" style="background-color: #772D8B; border-radius: 20px; border:none; color: white;">

          <?php
          $city = mysqli_query($db, "SELECT * FROM city");
          echo'<option>Pilih Kota</option>';
            echo'<option value="0">All</option>';
            while ($city_res = mysqli_fetch_assoc($city)) {
              echo '<option value="' . $city_res["CI_ID"] . '">' . $city_res["CI_Name"] . '</option>';
            }
          ?>
        </select>
      </div>
        
        <div class="movie-list">
          
          <?php 
            if (! isset($_GET['selectedValue'])) {
                $result3 = mysqli_query($db, "SELECT * FROM Movies");
                    while($res3 = mysqli_fetch_assoc($result3)){
                      echo'
                      <div class="card text-white bg-dark" style="width: 16.5rem;">
                        <img src="./source/images/'.$res3['M_Poster'].'" class="card-img-top" alt="...">
                        <div class="h-100"></div>
                        <div class="card-body">
                          <h5 class="card-title">'.$res3['M_Title'].'</h5>
                          <p class="card-text" style="font-size: smaller; color: lightgray;">'.$res3['M_Description'].'</p>
                          <div style=" display: flex; justify-content: space-between; align-items: center !important;">
                            <a href="">
                              <form action="booking.php" method="post" name="booking">
                                <input type="hidden" name="id_movie" value="' . $res3['M_ID'] . '">
                                <button type="submit" name="fromAll" class="btn-title">Get Ticket</button>
                              </form>
                            </a>
                            <p style="height: 10px !important;">⭐ 5.0</p>
                          </div>
                        </div>
                      </div>
                    ';}
              
              }else{
                $selectedValue = $_GET['selectedValue'];
                if($selectedValue == 0){
                  $result3 = mysqli_query($db, "SELECT * FROM Movies");
                  while($res3 = mysqli_fetch_assoc($result3)){
                    echo'
                    <div class="card text-white bg-dark" style="width: 16.5rem;">
                      <img src="./source/images/'.$res3['M_Poster'].'" class="card-img-top" alt="...">
                      <div class="h-100"></div>
                      <div class="card-body">
                        <h5 class="card-title">'.$res3['M_Title'].'</h5>
                        <p class="card-text" style="font-size: smaller; color: lightgray;">'.$res3['M_Description'].'</p>
                        <div style=" display: flex; justify-content: space-between; align-items: center !important;">
                          <a href="">
                            <form action="booking.php" method="post" name="booking">
                              <input type="hidden" name="id_movie" value="' . $res3['M_ID'] . '">
                              <button type="submit" name="fromAll" class="btn-title">Get Ticket</button>
                            </form>
                          </a>
                          <p style="height: 10px !important;">⭐ 5.0</p>
                        </div>
                      </div>
                    </div>
                  ';}
                }else{
                  $result3 = mysqli_query($db, "SELECT * FROM Movies, Bioskop, detail_bioskop_movies where M_ID = Movies_M_ID and B_ID = Bioskop_B_ID and City_CI_ID = $selectedValue group by M_ID");
                  while($res3 = mysqli_fetch_assoc($result3)){
                    echo'
                    <div class="card text-white bg-dark" style="width: 16.5rem;">
                      <img src="./source/images/'.$res3['M_Poster'].'" class="card-img-top" alt="...">
                      <div class="h-100"></div>
                      <div class="card-body">
                        <h5 class="card-title">'.$res3['M_Title'].'</h5>
                        <p class="card-text" style="font-size: smaller; color: lightgray;">'.$res3['M_Description'].'</p>
                        <div style=" display: flex; justify-content: space-between; align-items: center !important;">
                          <a href="">
                            <form action="booking.php" method="post" name="booking">
                              <input type="hidden" name="id_movie" value="' . $res3['M_ID'] . '">
                              <input type="hidden" name="id_city" value="'.$res3['City_CI_ID'].'">
                              <button type="submit" name="fromCity" class="btn-title">Get Ticket</button>
                            </form>
                          </a>
                          <p style="height: 10px !important;">⭐ 5.0</p>
                        </div>
                      </div>
                    </div>
                  ';}
                }
                      
              }
            
          ?>
          
        </div>
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

      
      function updatePHP() {
            // Dapatkan nilai terpilih
            var selectedValue = document.getElementById('select-city').value;

            // Lakukan sesuatu dengan nilai terpilih (opsional)
            console.log("Nilai yang dipilih: " + selectedValue);

            // Perbarui URL halaman dengan nilai terpilih
            window.location.href = window.location.pathname + '?selectedValue=' + selectedValue;
        }
    </script>
  </body>
</html>