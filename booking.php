<?php
// Include the database connection file
include("config.php");
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./source/style-booking.css">
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
                <a class="nav-link" href="theatre.php">Theater</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="authenticate.php">Login</a>
              </li>
              <?php  
                session_start();
                $id = $_SESSION["id_user"];
                $sql = "SELECT U_Name FROM user where U_ID = '$id'";
                $result = $db->query($sql);

                // Mengambil data dari hasil query
                $row = $result->fetch_assoc();

                // Menampilkan data di dalam elemen <p>
                echo '<li class="nav-item"><a class="nav-link" href="#" style="color:white !important;">' . $row["U_Name"] . '</a></li>';
                
            ?>
            </ul>
            
          </div>
        </div>
      </nav>

      <div class="cont" >
        <div class="movie-desc" style="background-image: url(./source/images/john-2.jpg); background-size: cover; filter: drop-shadow(50%);">
            <div class="gradient py-3" style="padding-top: 65px !important;">
                <div class="row px-2">
                    <div class="col col-lg-4 col-sm-12 col-12 text-center" style="">
                      <img src="./source/images/John-Wick-3-Movie-Poster.webp" alt="" style="height: 300px;">
                    </div>
                    <div class="col col-lg-8 col-sm-12 col-12 d-flex flex-column justify-content-center" style="">
                      <h1>John-Wick-3-Parabellum</h1>
                      <p style="font-size: smaller; color: lightgray;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus accusamus voluptate sed reiciendis excepturi.</p>
                      <p class="m-0">Cast :</p>
                      <div class="d-flex gap-3">
                        <p>people</p>
                        <p>people</p>
                        <p>people</p>
                      </div>
                      <p>lama tayang | Genre | tahun</p>
                      <p>⭐ 5.0</p>
                    </div>
                  </div>
            </div>
            
        </div>
        <div class="row p-3 my-3" style="background-color: #772d8b4a;">
          <div class="show-time col col-lg-6 d-flex justify-content-center">
            <div>
                <p style="font-weight: bolder;">Jam Tayang</p>
                <div class="d-flex gap-3">
                    <div class="p-1 px-2 time-item active-time">
                        12.00
                    </div>
                    <div class="p-1 px-2 time-item">
                        15.00
                    </div>
                    <div class="p-1 px-2 time-item">
                        19.00
                    </div>
                </div>
            </div>
          </div>
          <div class="seat-type col col-lg-6 d-flex justify-content-center">
              <div>
                  <p style="font-weight: bolder;">Tipe Theater</p>
                  <select name="" id="" class="py-2 px-3" style="background-color:  #772D8B; border-radius: 15px; color: white;">
                      <option value="">VIP</option>
                      <option value="">Regular</option>
                      <option value="">Deluxe</option>
                  </select>
              </div>
          </div>
        </div>


        <div class="row mb-5">
          <div class="col col-lg-3 col-12 p-5 d-flex flex-column gap-2" style="background-color: black">
            <h4>SmoothBrains Reservation</h4>
            <p>Jumlah Kursi</p>
            <select name="" id="" class="py-2 px-2" style="background-color: darkgray; border-radius: 15px;">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <p class="mb-0">Metode Bayar</p>
            <select name="" id="" class="py-2 px-2" style="background-color: darkgray; border-radius: 15px;">
              <option value="1">Credit Card</option>
              <option value="2">Online Transfer</option>
              <option value="3">G-Cash</option>
            </select> 
            <p class="pt-2">Total : </p>
            
          
            <a href=""><button class="btn-title w-100">Purchase</button></a>
          </div>
          <div class="col col-lg-9 col-12" style="background: url(./source/images/cinema-1.jpg); background-size: cover; padding: 0;">
            <div class="w-100 h-100 p-5" style="background-color: rgba(0, 0, 0, 0.811); width: 100% !important; ">
              <h4>Pilih Bioskop</h4>
              <div>

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

        let list = document.querySelectorAll('.time-item');

        for(i = 0; i < list.length; i++){
            list[i].addEventListener('click', function(){
                for(j = 0; j < list.length; j++){
                    list[j].classList.remove('active-time');
                }
                this.classList.add('active-time');
            })
        }
    </script>
  </body>
</html>