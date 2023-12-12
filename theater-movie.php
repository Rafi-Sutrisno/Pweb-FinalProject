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
        <a class="navbar-brand mx-1" href="#" style="font-weight: bolder;">Smooth Brains</a>
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
              <a class="nav-link" href="show.php">Shows</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="theatre.php">Bioskop</a>
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


    <div class="container-xxl p-4 my-5" style="background-color: black; color: white;">
      <div class="d-flex justify-content-between align-items-center mb-5 mt-5">
        <?php 
            if (isset($_POST['submit'])){
                $id_bioskop = mysqli_real_escape_string($db, $_POST['id_bioskop']);
                $result = mysqli_query($db, "SELECT B_Name, B_Address, City_CI_ID FROM bioskop where B_ID = '$id_bioskop'");
                $res = mysqli_fetch_assoc($result);
                $result2 = mysqli_query($db, "SELECT CI_Name FROM City WHERE CI_ID = {$res['City_CI_ID']}");
                $res2 = mysqli_fetch_assoc($result2);
            }
            
            echo '<div class="d-flex flex-column">
                    <h1>Movie di '.$res['B_Name'].'</h1>
                    <p style="font-weight: smaller; color:gray;">'.$res['B_Address'].'</p>
                    <h4>'.$res2['CI_Name'].'</h4>
                  </div>
                ';

        ?>
        <p style="font-weight: smaller; color:gray;"></p>
      </div>
        
        <div class="movie-list">
          <div class="card text-white bg-dark" style="width: 16.5rem;">
            <img src="./source/images/John-Wick-3-Movie-Poster.webp" class="card-img-top" alt="...">
            <div class="h-100"></div>
            <div class="card-body">
              <h5 class="card-title">John Wick : Parabellum</h5>
              <p class="card-text" style="font-size: smaller; color: lightgray;">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <div style=" display: flex; justify-content: space-between; align-items: center !important;">
                <a href=""><button class="btn-title">Get Ticket</button></a>
                <p style="height: 10px !important;">⭐ 5.0</p>
              </div>
            </div>
          </div>
          <div class="card text-white bg-dark" style="width: 16.5rem;">
            <img src="./source/images/transformer-1.jpg" class="card-img-top" alt="...">
            <div class="h-100"></div>
            <div class="card-body">
              <h5 class="card-title">Transformers</h5>
              <p class="card-text" style="font-size: smaller; color: lightgray;">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <div style=" display: flex; justify-content: space-between; align-items: center !important;">
                <a href=""><button class="btn-title">Get Ticket</button></a>
                <p style="height: 10px !important;">⭐ 5.0</p>
              </div>
            </div>
          </div>
          <div class="card text-white bg-dark" style="width: 16.5rem;">
            <img src="./source/images/godzilla-1.jpg" class="card-img-top" alt="...">
            <div class="h-100"></div>
            <div class="card-body">
              <h5 class="card-title">King of the Monster</h5>
              <p class="card-text" style="font-size: smaller; color: lightgray;">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <div style=" display: flex; justify-content: space-between; align-items: center !important;">
                <a href=""><button class="btn-title">Get Ticket</button></a>
                <p style="height: 10px !important;">⭐ 5.0</p>
              </div>
            </div>
          </div>
          <div class="card text-white bg-dark" style="width: 16.5rem;">
            <img src="./source/images/avenger-1.jpg" class="card-img-top" alt="...">
            <div class="h-100"></div>
            <div class="card-body">
              <h5 class="card-title">Avenger : End Game</h5>
              <p class="card-text" style="font-size: smaller; color: lightgray;">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <div style=" display: flex; justify-content: space-between; align-items: center !important;">
                <a href=""><button class="btn-title">Get Ticket</button></a>
                <p style="height: 10px !important;">⭐ 5.0</p>
              </div>
            </div>
          </div>
          <div class="card text-white bg-dark" style="width: 16.5rem;">
            <img src="./source/images/lincoln-1.jpg" class="card-img-top" alt="...">
            <div class="h-100"></div>
            <div class="card-body">
              <h5 class="card-title">Lincoln</h5>
              <p class="card-text" style="font-size: smaller; color: lightgray;">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <div style=" display: flex; justify-content: space-between; align-items: center !important;">
                <a href=""><button class="btn-title">Get Ticket</button></a>
                <p style="height: 10px !important;">⭐ 5.0</p>
              </div>
            </div>
          </div>
          <div class="card text-white bg-dark" style="width: 16.5rem;">
            <img src="./source/images/65-1.webp" class="card-img-top" alt="...">
            <div class="h-100"></div>
            <div class="card-body">
              <h5 class="card-title">65</h5>
              <p class="card-text" style="font-size: smaller; color: lightgray;">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <div style=" display: flex; justify-content: space-between; align-items: center !important;">
                <a href=""><button class="btn-title">Get Ticket</button></a>
                <p style="height: 10px !important;">⭐ 5.0</p>
              </div>
            </div>
          </div>
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
    </script>
  </body>
</html>