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

    /* Movie List */
    if (isset($_POST['submit'])){
        $id_bioskop = mysqli_real_escape_string($db, $_POST['id_bioskop']);
        $result = mysqli_query($db, "SELECT B_Name, B_Address, City_CI_ID FROM bioskop where B_ID = '$id_bioskop'");
        $res = mysqli_fetch_assoc($result);
    }
    
    /* POST DMB */
    $movies = "SELECT * FROM movies";
    $moviesResult = $db->query($movies);

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
              <a class="nav-link" href="show.php">Shows</a>
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


    <div class="container-xxl p-4 " style="background-color: black; color: white;">
      <div class="d-flex justify-content-between align-items-center mb-5 mt-5">
        <div class="d-flex flex-column w-100 align-items-center justify-content-center">
        <?php 
            echo '
                    <h1>Movies in '.$res['B_Name'].'</h1>
                    <p style="font-weight: smaller; color:gray;">'.$res['B_Address'].'</p>
            ';

            if ($status == 2){
              echo '<button type="button" class="btn-title mt-2" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">+ Add Movie to Bioskop</button>';
            }
        ?>
          <!-- Post Movie-Bioskop Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title text-black" id="exampleModalLabel">Add New Movies to Bioskop</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form id="form-movies" action="handle-dmb.php" method="POST" enctype="multipart/form-data">
                    <fieldset class="d-flex flex-column gap-2 mb-3">
                        <?php
                        echo '<input type="hidden" name="b_id" value="' . $id_bioskop . '">';
                        ?>
                        <label for="movies" class="text-dark">Select Movies: </label>
                        <select id="movie" name="movie" class="bg-dark text-white">
                          <?php
                          while ($moviesRow = $moviesResult->fetch_assoc()) {
                            echo '<option value="' . $moviesRow["M_ID"] . '">' . $moviesRow["M_Title"] . '</option>';
                          }
                          ?>
                        </select>
                    </fieldset>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a href="#" class="" target="_blank">
                      <button class="btn btn-secondary" type="submit" name="post-dmb">Add Movie</button>
                    </a>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- End of Modal -->
        </div>

        <p style="font-weight: smaller; color:gray;"></p>
      </div>
        
        <div class="movie-list">
            <?php 
                $result = mysqli_query($db, "SELECT * FROM Movies, detail_bioskop_movies where M_ID = Movies_M_ID and Bioskop_B_ID = '$id_bioskop'");
          
                while($res = mysqli_fetch_assoc($result)){
                  
                  echo'
                  <div class="card text-white bg-dark" style="width: 16.5rem;">
                    <img src="./source/images/'.$res['M_Poster'].'" class="card-img-top" alt="...">
                    <div class="h-100"></div>
                    <div class="card-body">
                      <h5 class="card-title">'.$res['M_Title'].'</h5>
                      <p class="card-text" style="font-size: smaller; color: lightgray;">'.$res['M_Description'].'</p>
                      <div style=" display: flex; justify-content: space-between; align-items: center !important;">
                        <a href="">
                          <form action="booking.php" method="post" name="booking">
                            <input type="hidden" name="id_movie" value="' . $res['M_ID'] . '">
                            <input type="hidden" name="id_bioskop" value="' . $id_bioskop . '">
                            <button type="submit" name="fromTheater" class="btn-title">Get Ticket</button>
                          </form>
                        </a>
                        <p style="height: 10px !important;">⭐ 5.0</p>
                      </div>
                    </div>
                  </div>
                ';}
            ?>
          
          
        </div>

        <div class="theater-list d-flex flex-column px-4 mb-5">
          <div class="d-flex flex-column align-items-center mt-4 mb-4 gap-3">
            <h3>Theatres</h3>
            <?php
              if ($status == 2){
                echo '<button type="button" class="btn-title" data-bs-toggle="modal" data-bs-target="#theatreModal" data-bs-whatever="@mdo">+ Add Theatre to Bioskop</button>';
              }
            ?>
            <!-- Post Theatre Modal -->
            <div class="modal fade" id="theatreModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title text-black" id="exampleModalLabel">Add New Theatre</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form id="form-movies" action="handle-theatre.php" method="POST" enctype="multipart/form-data">
                      <fieldset class="d-flex flex-column gap-2 mb-3">
                          <label for="nama" class="text-dark">Nama Theatre</label>
                          <input class="px-2 py-2 rounded-3 bg-dark" type="text" name="nama" id="nama" placeholder="Theatre Name">

                          <label for="tipe" class="text-dark">Tipe Theatre</label>
                          <input class="px-2 py-2 rounded-3 bg-dark" type="text" name="tipe" id="tipe" placeholder="Theatre Type (Imax, Premiere, Regular)">
                          
                          <label for="seats" class="text-dark">Jumlah Seats</label>
                          <input class="px-2 py-2 rounded-3 bg-dark" name="seats" id="seats" placeholder="Number of seats"></input>
                          
                          <label for="price" class="text-dark">Harga Per Tiket</label>
                          <input class="px-2 py-2 rounded-3 bg-dark" type="text" name="price" id="price" placeholder="bioskop phone number">

                          <?php
                          echo '<input type="hidden" name="b_id" value="' . $id_bioskop . '">';
                          ?>

                          <label for="movies-dropdown" class="text-dark">Movies to show:</label>
                          <select id="movies-id" name="movies-id" class="bg-dark text-white">
                            <?php
                              $result = mysqli_query($db, "SELECT * FROM Movies, detail_bioskop_movies where M_ID = Movies_M_ID and Bioskop_B_ID = '$id_bioskop'");
                              while ($titleRow = mysqli_fetch_assoc($result)) {
                                echo '<option value="' . $titleRow['M_ID'] . '">' . $titleRow['M_Title'] . '</option>';
                              }
                            ?>
                          </select>
                      </fieldset>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                      <a href="#" class="" target="_blank">
                        <button class="btn btn-secondary" type="submit" name="post-theatre">Add Theatre</button>
                      </a>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- End of Modal -->
          </div>
          <div class="inner-theater-list d-flex flex-column gap-2">
            <?php 
              $theaterRes = mysqli_query($db, "SELECT * FROM theatre WHERE Bioskop_B_ID='$id_bioskop'");
              while ($theater = mysqli_fetch_assoc($theaterRes)) {
                $movieID = $theater['Movies_M_ID'];
                $moviesResult = mysqli_query($db, "SELECT * FROM theatre, movies WHERE Movies_M_ID='$movieID' and M_ID='$movieID'");
                $getMovie = mysqli_fetch_assoc($moviesResult);
                echo '
                  <div class="theatre p-2 w-100 text-start row">
                    <div class="theatre-div col col-lg-2">
                      <h4>'. $theater['T_Name'] .'</h4>
                    </div>
                    <div class="theatre-div col col-lg-2">
                      <h4>'. $theater['T_Type'] .'</h4>
                    </div>
                    <div class="theatre-div d-flex flex-row gap-2 col col-lg-2">
                        <img src="./source/images/ticket.png" class="icon"> 
                        <h4>'. $theater['T_Num_of_seat'] .'</h4>
                    </div>
                    <div class="theatre-div d-flex flex-row gap-2 col col-lg-2">
                        <img src="./source/images/money.png" class="icon"> 
                        <h4>'. $theater['T_Price'] .'</h4>
                    </div>
                    <div class="theatre-div d-flex flex-row gap-2 col col-lg-4">
                        <img src="./source/images/film-reel.png" class="icon"> 
                        <h4>'. $getMovie['M_Title'] .'</h4>
                    </div>
                  </div>
                      
                ';
              }
            ?>
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