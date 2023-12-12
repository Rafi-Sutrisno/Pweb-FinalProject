<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Register Smooth Brains</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500&display=swap" rel="stylesheet">

    <link rel='stylesheet' type='text/css' media='screen' href='./source/bootstrap-5.0.2-dist/css/bootstrap.min.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='./source/register.css'>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha384-1H217gwSVyLSIfaLxHbE7dRb3v4mYCKbpQvzx0cegeju1MVsGrX5xXxAvs/HgeFs" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js" integrity="sha384-jnyECYBYsio2srkTbkTTdIbbARqAmCmk+eLJF5JW88/fBk7ReH4MfpHchD8fhaLV" crossorigin="anonymous"></script>

    <!-- <script src="./source/ajax.js" defer></script> -->
</head>
<body>
    <!--Navigation Bar-->
    <nav class="navbar bg-dark d-flex justify-content-start align-items-center p-lg-4">
        <div class="d-flex gap-2 align-items-center">
            <div style="border-radius: 50%;" class="icon">
            </div>
            <h1 class="text-white fs-4 mt-1 pl">Smooth Brains.</h1>
        </div>
    </nav>

    <!--Forms-->
    <div id="container_form" class="container d-flex flex-row gap-1 mx-lg-0 pt-lg-4 pb-lg-3 px-lg-5 justify-content-center">
        <!--Register-->
        <div id="register" class="d-flex flex-column mx-auto rounded-3 justify-content-start align-items-center mt-lg-5 pt-lg-5">
            <h4>register.</h4>

            <form name="form-regist" action="post-register.php" method="POST" class="mt-lg-5">
                <fieldset class="d-flex flex-column gap-2" style="max-width: 250px;">
                    <input class="px-2 py-2 rounded-3 bg-dark" type="text" name="name" id="name" placeholder="name">
                    <input class="px-2 py-2 rounded-3 bg-dark" type="email" name="email" id="email" placeholder="email">
                    <input class="px-2 py-2 rounded-3 bg-dark" type="password" name="password" id="password" placeholder="password">

                    <a href="#" class="mt-4" target="_blank">
                        <button class="btn bg-dark" type="submit" id="register">Register</button>
                    </a>

                    <p id="response"></p>

                </fieldset>
            </form>
        </div>

        <!--Login-->
        <div id="login" class="d-flex flex-column gap-2  mx-auto rounded-3 justify-content-start align-items-center mt-lg-5 pt-lg-5">
            <h4>login.</h4>

            <form name="form-login" action="" class="mt-lg-5">
                <fieldset class="d-flex flex-column gap-2" style="max-width: 250px;">
                    <input class="px-2 py-2 rounded-3 bg-dark" type="email" name="email" id="email" placeholder="email">
                    <input class="px-2 py-2 rounded-3 bg-dark" type="password" name="password" id="password" placeholder="password">
                    <div class="px-2 py-3 rounded-3 bg-transparent"></div>

                    <a href="#" class="mt-4" target="_blank">
                        <button class="btn bg-dark" type="submit" name="login">Login</button>
                    </a>

                </fieldset>
            </form>
        </div>

    </div>
</body>
</html>