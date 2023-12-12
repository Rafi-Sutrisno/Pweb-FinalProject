<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./source/style-booking.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="navbar">
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
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Dropdown
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
            </ul>
            
          </div>
        </div>
      </nav>

      <div class="cont" style="padding-top: 60px;">
        <div class="movie-desc" style="background-image: url(./source/images/john-2.jpg); background-size: cover; filter: drop-shadow(50%);">
            <div class="gradient py-2">
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
        <div class="book-desc d-flex flex-column align-items-center mb-5 mt-5">
            <div class="w-100 row" >
                <div class="show-time col col-lg-6 d-flex justify-content-center">
                    <div>
                        <p style="font-weight: bolder;">Jam Tayang</p>
                        <div class="d-flex gap-2">
                            <div class="p-1 px-2 time-item">
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
                <div class="seat-type col col-lg-6 d-flex justify-content-center" >
                    <div>
                        <p style="font-weight: bolder;">Tipe kursi</p>
                        <select name="" id="" class="py-2 px-3" style="background-color: darkgray; border-radius: 20px;">
                            <option value="">VIP</option>
                            <option value="">Regular</option>
                            <option value="">Deluxe</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
      

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>