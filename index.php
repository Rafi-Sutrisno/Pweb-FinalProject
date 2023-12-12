<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./source/style-index.css">
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
              <a class="nav-link active" aria-current="page" href="#">Home</a>
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
    
    <div class="top-component container-xxl d-flex p-0 mb-5" style="background-color: black;">
      <div class="mycarousel" style="width: 100%;">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="./source/images/jurassic-1.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption title h-100 d-flex flex-column justify-content-center" style="max-width: 450px;">
                          <div>
                            <h6 class="d-flex align-items-start">Exclusive on this website</h6>
                          </div>
                          <div class="title-bot d-flex flex-column align-items-start">
                              <h1>The Movie Title</h1>
                              <h6>Jan 30 2023 - 08.00</h6>
                              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam dolores ducimus minus. Omnis facere, architecto rem eos</p>
                              <a href="#" class="mt-2"><button class="btn-title">Get Ticket</button></a>
                          </div>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <img src="./source/images/avenger-2.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption title h-100 d-flex flex-column justify-content-center" style="max-width: 450px;">
                          <div>
                            <h6 class="d-flex align-items-start">Exclusive on this website</h6>
                          </div>
                          <div class="title-bot d-flex flex-column align-items-start">
                              <h1>The Movie Title</h1>
                              <h6>Jan 30 2023 - 08.00</h6>
                              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam dolores ducimus minus. Omnis facere, architecto rem eos</p>
                              <a href="#" class="mt-2"><button class="btn-title">Get Ticket</button></a>
                          </div>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <img src="./source/images/top-mv-3.jpeg" class="d-block w-100" alt="...">
                        <div class="carousel-caption title h-100 d-flex flex-column justify-content-center" style="max-width: 450px;">
                          <div>
                            <h6 class="d-flex align-items-start">Exclusive on this website</h6>
                          </div>
                          <div class="title-bot d-flex flex-column align-items-start">
                              <h1>The Movie Title</h1>
                              <h6>Jan 30 2023 - 08.00</h6>
                              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam dolores ducimus minus. Omnis facere, architecto rem eos</p>
                              <a href="#" class="mt-2"><button class="btn-title">Get Ticket</button></a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
            </div>
    </div>
    <div class="main-component  p-4 mb-5">
      <div class="d-flex justify-content-between align-items-center mb-4 px-4">
        <h3>Shows</h3>
        <a href="show.php" style="text-decoration: none;"><h7 style="color: gray">View All</h7></a>
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
      </div>
    </div>

    <div class="theater-list d-flex flex-column px-4 mb-5">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Theaters</h3>
        <a href="theatre.php" style="text-decoration: none;"><h7 style="color: gray">View All</h7></a>
      </div>
      <div class="inner-theater-list d-flex flex-column gap-2">
        <a href="">
          <div class="theater-item p-2">
            <h4>Imax Surabaya</h4>
          </div>
        </a>
        <a href="">
          <div class="theater-item p-2">
            <h4>2D Surabaya</h4>
          </div>
        </a>
        <a href="">
          <div class="theater-item p-2">
            <h4>VIP Surabaya</h4>
          </div>
        </a>
        <a href="">
          <div class="theater-item p-2">
            <h4>3D Surabaya</h4>
          </div>
        </a>
      </div>
    </div>

    <footer>

    </footer>
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