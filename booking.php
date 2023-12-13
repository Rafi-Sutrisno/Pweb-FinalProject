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

    /* Retrieve ID Movie*/
    $id_bioskop = null;
    $id_movie = null;
    $id_city = null;
    $status_retrieve = null;

    if (isset($_POST['fromTheater'])){
      $id_movie = mysqli_real_escape_string($db, $_POST['id_movie']);
      $id_bioskop = mysqli_real_escape_string($db, $_POST['id_bioskop']);
      $status_retrieve = 'fromTheater';
    } else if (isset($_POST['fromAll'])){
      $id_movie = mysqli_real_escape_string($db, $_POST['id_movie']);
      $status_retrieve = 'fromAll';
    } else if (isset($_POST['fromCity'])){
      $id_movie = mysqli_real_escape_string($db, $_POST['id_movie']);
      $id_city = mysqli_real_escape_string($db, $_POST['id_city']);
      $status_retrieve = 'fromCity';
    }

    /* Get Pressed Movie */
    $result = mysqli_query($db, "SELECT * FROM movies where M_ID = '$id_movie'");
    $res = mysqli_fetch_assoc($result);


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

      <div class="cont " >
        <?php 
          
          echo '
            <div class="movie-desc" style="background-image: url(./source/images/'.$res['M_Background'].'); background-size: cover;">
                <div class="gradient py-3" style="padding-top: 65px !important;">
                    <div class="row px-2">
                        <div class="col col-lg-4 col-sm-12 col-12 text-center" style="">
                          <img src="./source/images/'.$res['M_Poster'].'" alt="" style="height: 300px;">
                        </div>
                        <div class="col col-lg-8 col-sm-12 col-12 d-flex flex-column justify-content-center" style="">
                          <h1>'.$res['M_Title'].'</h1>
                          <p style="font-size: smaller; color: lightgray;">'.$res['M_Description'].'</p>
                          <p class="m-0">Cast :</p>
                          <div class="d-flex gap-3">
                            <p>people</p>
                            <p>people</p>
                            <p>people</p>
                          </div>
                          <p>'.$res['M_Duration'].' | Genre | '.$res['M_ReleaseDate'].'</p>
                          <p>⭐ 5.0</p>
                        </div>
                      </div>
                </div> 
            </div>
          ';
        ?>
        

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
                  <select name="" id="t_type" class="py-2 px-3" style="background-color:  #772D8B; border-radius: 15px; color: white;">
                      <option disabled="disabled" selected="selected">Choose Type</option>
                      <option value="Regular">Regular</option>
                      <option value="IMAX">IMAX</option>
                      <option value="Premiere">Premiere</option>
                  </select>
              </div>
          </div>
        </div>


        <div class="row mb-5">
          <div class="col col-lg-3 col-12 p-5 d-flex flex-column gap-2" style="background-color: black">
            <h4>SmoothBrains Reservation</h4>
            <p>Jumlah Kursi</p>
            <select name="" id="chosenNumber" class="py-2 px-2" style="background-color: darkgray; border-radius: 15px;">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <p class="mb-0">Metode Bayar</p>
            <select name="" id="chosenMethod" class="py-2 px-2" style="background-color: darkgray; border-radius: 15px;">
              <option value="Credit Card">Credit Card</option>
              <option value="Online Transfer">Online Transfer</option>
              <option value="G-Cash">G-Cash</option>
            </select> 
            <p class="pt-2">Total : </p>
            
            <button type="button" id="purchaseBtn" class="btn-title" data-bs-toggle="modal" data-bs-target="#purchaseModal" data-bs-whatever="@mdo">Purchase</button>

              <!-- Post Theatre Modal -->
              <div class="modal fade" id="purchaseModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title text-black" id="exampleModalLabel">Purchase Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body" >
                    <form id="form-transaksi" action="handle-transaksi.php" method="POST" enctype="multipart/form-data">
                      <fieldset class="d-flex flex-column gap-2 mb-3">
                          <label for="nama" class="text-dark">Nama Theatre</label>
                          <input class="px-2 py-2 rounded-3 bg-dark" type="text" name="t_name" id="t_name" readonly>

                          <label for="tipe" class="text-dark">Tipe Theatre</label>
                          <input class="px-2 py-2 rounded-3 bg-dark" type="text" name="theatreType" id="theatreType" readonly>
                          
                          <label for="seats" class="text-dark">Harga Satu Tiket</label>
                          <input class="px-2 py-2 rounded-3 bg-dark" name="t_price" id="t_price" readonly>
                          
                          <label for="price" class="text-dark">Nama Bioskop</label>
                          <input class="px-2 py-2 rounded-3 bg-dark" type="text" name="b_name" id="b_name" readonly>

                          <label for="price" class="text-dark">Kota</label>
                          <input class="px-2 py-2 rounded-3 bg-dark" type="text" name="ci_name" id="ci_name" readonly>

                          <label for="price" class="text-dark">Jumlah Tiket Yang Dibeli</label>
                          <input class="px-2 py-2 rounded-3 bg-dark" type="text" name="numOfTicket" id="numOfTicket" readonly>

                          <label for="price" class="text-dark">Metode Pembayaran</label>
                          <input class="px-2 py-2 rounded-3 bg-dark" type="text" name="payMethod" id="payMethod" readonly>

                          <label for="price" class="text-dark">Total Harga</label>
                          <input class="px-2 py-2 rounded-3 bg-dark" type="text" name="totalPrice" id="totalPrice" readonly>

                          <?php
                            echo '<input type="hidden" name="u_id" value="' . $id . '">';
                            echo '<input type="hidden" name="m_id" value="' . $id_movie . '">';
                          ?>
                      </fieldset>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                      <a href="#" class="" target="_blank">
                        <button class="btn btn-secondary" type="submit" name="post-transaksi">Purchase</button>
                      </a>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- End of Modal -->
          </div>

          <div class="col col-lg-9 col-12" style="background: url(./source/images/cinema-1.jpg); background-size: cover; padding: 0;">
            <div class="w-100 h-100 p-5" style="background-color: rgba(0, 0, 0, 0.811); width: 100% !important; ">
            <!-- From Theatre -->  
            <h4>Pilih Theater</h4>
            <div class="theatre-info p-2 w-100 mt-3 text-start row">
              <h5 class="col col-lg-3">Theatre Name</h5>
              <h5 class="col col-lg-3">Type - Price</h5>
              <h5 class="col col-lg-3">Bioskop Name</h5>
              <h5 class="col col-lg-3">City</h5>
            </div>
              <div id="theatreContainer" class="mt-3 d-flex flex-column gap-3">
                <?php
                  if($status_retrieve == 'fromTheater'){
                    /* Get Theatres Query */
                    $getTheatre = mysqli_query($db, "SELECT * FROM theatre, bioskop, city where Bioskop_B_ID = B_ID and City_CI_ID = CI_ID and Movies_M_ID = '$id_movie' and Bioskop_B_ID = '$id_bioskop'");
                    while($rowTheatre = mysqli_fetch_assoc($getTheatre)){
                      echo '
                        <div class="theatre p-2 w-100 text-start row">
                          <h5 class="col col-lg-3">' . $rowTheatre['T_Name'] . '</h5>
                          <div class="col col-lg-3 d-flex flex-row gap-2">
                            <h5>' . $rowTheatre['T_Type'] . ' - </h5>
                            <h5>Rp' . $rowTheatre['T_Price'] . '</h5>
                          </div>
                          <h5 class="col col-lg-3">'.$rowTheatre['B_Name'].'</h5>
                          <h5 class="col col-lg-3">'.$rowTheatre['CI_Name'].'</h5>
                        </div>
                      ';
                    }
                  } else if ($status_retrieve == 'fromAll'){
                    /* Get Theatres Query */
                    $getTheatre = mysqli_query($db, "SELECT * FROM theatre, bioskop, city where Bioskop_B_ID = B_ID and City_CI_ID = CI_ID and Movies_M_ID = '$id_movie' ");
                    while($rowTheatre = mysqli_fetch_assoc($getTheatre)){
                      echo '
                        <div class="theatre p-2 w-100 text-start row ">
                          <h5 class="col col-lg-3">' . $rowTheatre['T_Name'] . '</h5>
                          <div class="col col-lg-3 d-flex flex-row gap-2">
                            <h5>' . $rowTheatre['T_Type'] . ' - </h5>
                            <h5>Rp' . $rowTheatre['T_Price'] . '</h5>
                          </div>
                          <h5 class="col col-lg-3">'.$rowTheatre['B_Name'].'</h5>
                          <h5 class="col col-lg-3">'.$rowTheatre['CI_Name'].'</h5>
                        </div>
                      ';
                    }
                  } else if ($status_retrieve == 'fromCity'){
                    $getTheatre = mysqli_query($db, "SELECT * FROM theatre, bioskop, city where Movies_M_ID = '$id_movie' and Bioskop_B_ID = B_ID and City_CI_ID = CI_ID and City_CI_ID = '$id_city'");
                    while($rowTheatre = mysqli_fetch_assoc($getTheatre)){
                      echo '
                        <div class="theatre p-2 w-100 text-start row">
                          <h5 class="col col-lg-3">' . $rowTheatre['T_Name'] . '</h5>
                          <div class="col col-lg-3 d-flex flex-row gap-2">
                            <h5>' . $rowTheatre['T_Type'] . ' - </h5>
                            <h5>Rp' . $rowTheatre['T_Price'] . '</h5>
                          </div>
                          <h5 class="col col-lg-3">'.$rowTheatre['B_Name'].'</h5>
                          <h5 class="col col-lg-3">'.$rowTheatre['CI_Name'].'</h5>
                        </div>
                      ';
                    }
                  }
                ?>
              </div>
            </div>
          </div>
        </div>



    
      

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha384-1H217gwSVyLSIfaLxHbE7dRb3v4mYCKbpQvzx0cegeju1MVsGrX5xXxAvs/HgeFs" crossorigin="anonymous"></script>
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

      let theatres = document.querySelectorAll('.theatre');

      for(i = 0; i < theatres.length; i++){
          theatres[i].addEventListener('click', function(){
              for(j = 0; j < theatres.length; j++){
                theatres[j].classList.remove('active-theatre');
              }
              this.classList.add('active-theatre');
          })
      }

      $('#purchaseBtn').on('click', function() {
        // Gather data from HTML elements
        var theatreName = $('.active-theatre > h5:nth-child(1)').text();
        var theatreType = $('.active-theatre > .col h5:nth-child(1)').text();
        var theatrePrice = $('.active-theatre > .col h5:nth-child(2)').text();
        var bioskopName = $('.active-theatre h5:nth-child(3)').text();
        var city = $('.active-theatre > h5:nth-child(4)').text(); 
        var numTickets = document.getElementById("chosenNumber").value;
        var method = document.getElementById("chosenMethod").value;

        var intPrice = parseInt(theatrePrice.substring(2));
        var intNumTickets = parseInt(numTickets);
        var totalPrice = intPrice * intNumTickets;
        var modifiedType = theatreType.replace(/[\s-]/g, '');

        document.getElementById('t_name').value = theatreName;
        document.getElementById('theatreType').value = modifiedType;
        document.getElementById('t_price').value = theatrePrice;
        document.getElementById('b_name').value = bioskopName;
        document.getElementById('ci_name').value = city;
        document.getElementById('numOfTicket').value = numTickets;
        document.getElementById('payMethod').value = method;
        document.getElementById('totalPrice').value = "Rp" + totalPrice;

      })

  
      $(document).ready(function () {
        $('#t_type').change(function () {
          var selectedType = $(this).val();
          var selectedID = <?php echo json_encode($id_movie); ?>;
          var selectedStatus = <?php echo json_encode($status_retrieve); ?>;
          var selectedBioskop = <?php echo json_encode($id_bioskop); ?>;
          var selectedCity = <?php echo json_encode($id_city); ?>;

          // Make Ajax request to get the corresponding divs
          $.ajax({
            url: 'handle-filtering.php',
            type: 'GET',
            data: { type: selectedType, idMovie: selectedID, status_r: selectedStatus, idBioskop: selectedBioskop, idCity: selectedCity},
            dataType: 'json',
            success: function (data) {
              // Update the container with the received divs
              $('#theatreContainer').html(data.join(''));
              let theatres = document.querySelectorAll('.theatre');

              for(i = 0; i < theatres.length; i++){
                  theatres[i].addEventListener('click', function(){
                      for(j = 0; j < theatres.length; j++){
                        theatres[j].classList.remove('active-theatre');
                      }
                      this.classList.add('active-theatre');
                  })
              }
            },
            error: function (error) {
              console.error('Ajax request failed:', error);
            }
          });
        });
      });
      
    </script>
  </body>
</html>