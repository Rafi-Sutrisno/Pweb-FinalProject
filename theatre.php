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

    $city = "SELECT * FROM city";
    $cityResult = $db->query($city)
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./source/style-theater.css">
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

    <div class="theater-list d-flex flex-column px-4 mt-5 mb-5" style="background-color: black;">
      <div class="d-flex flex-row mb-4 mt-4 gap-3">
        <h3>Bioskop</h3>
        <?php
          if ($status == 2){
            echo '<button type="button" class="btn-title" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">+ Add Bioskop</button>';
          }
        ?>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title text-black" id="exampleModalLabel">Add New Bioskop</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form id="form-movies" action="handle-bioskop.php" method="POST" enctype="multipart/form-data">
                  <fieldset class="d-flex flex-column gap-2 mb-3">
                      <label for="Nama" class="text-dark">Nama</label>
                      <input class="px-2 py-2 rounded-3 bg-dark" type="text" name="nama" id="nama" placeholder="bioskop name">
                      
                      <label for="address" class="text-dark">Address</label>
                      <textarea class="px-2 py-2 rounded-3 bg-dark" name="address" id="address" placeholder="bioskop address"></textarea>
                      
                      <label for="phone" class="text-dark">Phone</label>
                      <input class="px-2 py-2 rounded-3 bg-dark" type="text" name="phone" id="phone" placeholder="bioskop phone number">

                      <label for="city" class="text-dark">City</label>
                      <select id="city" name="city" class="bg-dark text-white">
                        <?php
                        while ($cityRow = $cityResult->fetch_assoc()) {
                          echo '<option value="' . $cityRow["CI_ID"] . '">' . $cityRow["CI_Name"] . '</option>';
                        }
                        ?>
                      </select>
                  </fieldset>
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  <a href="#" class="" target="_blank">
                    <button class="btn btn-secondary" type="submit" name="post-bioskop">Add Bioskop</button>
                  </a>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="inner-theater-list d-flex flex-column gap-2">
        <?php 
        $result = mysqli_query($db, "SELECT * FROM bioskop");
        while ($res = mysqli_fetch_assoc($result)) {
          echo '<a href="">
                  <form action="theater-movie.php" method="post" name="theater-movie">
                    <input type="hidden" name="id_bioskop" value="' . $res['B_ID'] . '">
                    <button type="submit" name="submit" class="theater-item p-2 w-100 text-start" style="color: white; border : 2px solid #772D8B">
                      <h4>'. $res['B_Name'] .'</h4>
                    </button>
                  </form>
                </a>';
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
    </script>
  </body>
</html>