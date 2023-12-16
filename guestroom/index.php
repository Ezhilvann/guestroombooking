<!DOCTYPE html>
<html lang="en">
<?php
session_start();

// Prevent caching
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
if (isset($_SESSION['user_id'])) {
    // Destroy the session (log out the user)
    session_destroy();
}
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GuestRoom</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Poppins:ital,wght@1,400;1,500&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <script src="js/home.js"></script>
</head>

<body class=bg-light> 
    <nav class="navbar navbar-expand-lg navbar-light bg-light px-lg-3 py-lg-2 shadow-lg sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="index.php">COPPER HOTEL</a>
            <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active me-2" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="#Rooms">Rooms</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="#foot">Contact us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="owner.html">Your Property</a>
                    </li>
                </ul>
                <div class="d-flex" id="loginButtons">
                    <!-- <button class="btn btn-outline-success" type="submit">Search</button> -->
                    <button type="button" class="btn btn-outline-dark shadow-none me-lg-2 me-2"
                        data-bs-toggle="modal" data-bs-target="#loginModal">
                        Login
                    </button>
                    <button type="button" class="btn btn-outline-dark shadow-none" data-bs-toggle="modal"
                        data-bs-target="#registerModal">
                        Register
                    </button>
                </div>
            </div>
        </div>
    </nav>
    <!-- LoginModal -->
    <div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form enctype="multipart/form-data" data-remote="true" id="log">
                    <div class="modal-header">
                        <h5 class="modal-title d-flex align-center">
                            <i class="bi bi-person-square fs-4 me-2"></i>User Login</h5>
                        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control shadow-none" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Password</label>
                            <input type="password" name="pasw" class="form-control shadow-none" required>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <button type="submit" class="btn btn-dark shadow-none">Login</button>
                            <a href="javascript: void(0)" class="text-secondary text-decoration-none">Forgot
                                password</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Register Modal -->
    <div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form enctype="multipart/form-data" data-remote="true" id="reg">
                    <div class="modal-header">
                        <h5 class="modal-title d-flex align-center">
                        <i class="bi bi-person-circle fs-3 me-2"></i>User Registration</h5>
                        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <span class="badge rounded-pill bg-light text-dark mb-4 text-wrap lh-base h1-font">Note: Your details must with your ID(Aadhaar card,Passport,etc..) that require during check-in.</span>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 ps-0 mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control shadow-none">
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                            <label class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control shadow-none">
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                            <label class="form-label">Phone Number</label>
                            <input type="number" name="phone" class="form-control shadow-none">
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                            <label class="form-label">Picture</label>
                            <input type="file"  name="photo" id="photo" class="form-control shadow-none">
                            </div>
                            <div class="form-floating">
                                <textarea name="addres" class="form-control shadow-none" placeholder="Leave a comment here"></textarea>
                                <label class="floatingTextarea shadow-none">Address</label>
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="pasw" class="form-control shadow-none">
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" class="form-control shadow-none">
                            </div>
                        </div>
                    </div>   
                    <div class="text-center my-1">
                        <button type="submit" class="btn btn-dark shadow-none">Register</button>
                    </div>
                   
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container-fluid px-lg-4 mt-4">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="https://c4.wallpaperflare.com/wallpaper/787/399/647/life-resort-travel-vacation-wallpaper-preview.jpg"  class="w-100 d-block imag" alt="Slide 1">
            </div>
            <div class="swiper-slide">
                <img src="https://c4.wallpaperflare.com/wallpaper/653/585/146/life-resort-house-architecture-wallpaper-preview.jpg" class="w-100 d-block imag" alt="Slide 2">
            </div>
            <div class="swiper-slide">
                <img src="https://c4.wallpaperflare.com/wallpaper/172/921/248/nature-water-sea-travel-wallpaper-thumb.jpg" class="w-100 d-block imag" alt="Slide 3">
            </div>
            <div class="swiper-slide">
                <img src="https://c4.wallpaperflare.com/wallpaper/449/546/520/bedroom-forest-interior-wallpaper-preview.jpg" class="w-100 d-block imag" alt="Slide 4">
            </div>
        </div>
    </div>
    <!-- check availability form -->
    <section id="Rooms">
    <div class="container availability-form">
       
        <div class="row">
        <?php include('php/profile.php'); ?>
            <div class="col-lg-12 bg-light custom-shadow p-4 rounded">
            <h3 class="user_name_display mb-4 mt-3 h-font"></h3>
                <h4 class="mb-4">Check Room Availability</h4>
                <form>
                    <div class="row align-item-end">
                        <!-- <div class="col-lg-3 mb-3">
                            <label class="form-label home1"><i class="bi bi-geo-alt-fill"></i> Location</form>
                            <input type="text" class="form-control shadow-none" placeholder="Location" require>
                        </div>
                        <div class="col-lg-3  mb-3">
                        <label class="form-label home1"></label>
                        <div>
                        <button type="button" class="btn text-white shadow-none custom-bg">Search</button> -->

                        </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- our Rooms -->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Our Rooms</h2>
    <div class="container">
        <div class="row">
            <!-- booking cards -->
            <?php foreach ($rooms as $room) : ?>
        <div class="col-lg-4 col-md-6 my-3">
                    <div class="card" style="width: 18rem;">
                        <img src="uploads/<?php echo $room['photo']; ?>" class="card-img-top" alt="Room Image">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $room['hname']; ?></h5>
                            <p class="card-text">Price: <?php echo $room['price']; ?></p>
                            <a href="profilehtml.php?name=<?php  echo $room['hname'];?>" class="btn btn-primary">Book now</a>
                            <!-- <button class="btn btn-dark shadow-none"> book Now</button> -->
                        </div>
                       
                    </div>
                </div>
                <?php endforeach; ?>
                <!-- Booking cards ends -->
        </div>
</div>
</section>
</div>

<br><br><br>
<br><br><br>
<Section id="foot">
<footer>
    <h1>THANK YOU....KEEP IN TOUCH!</h1>
    <p><i class="bi bi-c-circle"></i> 2023 Copper Resort Booking PVT.LTD.</p>
    <p>country IND</p>
    <p><i class="bi bi-instagram"></i> Guestroom</p>
    <p><i class="bi bi-envelope-fill"></i> guestroombooking@gmail.com</p>
</footer>
</section>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
  function logout() {
    // Change buttons back to Login and Register
    document.querySelector('.user_name_display').innerHTML = "";
    document.getElementById('loginButtons').innerHTML = `
        <button type="button" class="btn btn-outline-dark shadow-none me-lg-2 me-2" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
        <button type="button" class="btn btn-outline-dark shadow-none" data-bs-toggle="modal" data-bs-target="#registerModal">Register</button>
    `;
}

$(document).on('submit', '#log', function(e) {
    e.preventDefault();

    console.log("Before AJAX request"); // Log a message before the AJAX request

    var formData = new FormData(this);
    formData.append("save_reg", true);

    $.ajax({
        type: "POST",
        url: "php/login.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            console.log("After AJAX request"); // Log a message after the AJAX request

            var res = jQuery.parseJSON(response);

            var delayInMilliseconds = 3000;

            setTimeout(function() {
                $('#loginModal').modal('hide');
            }, delayInMilliseconds);

            if (res.status == 200) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: res.message
                });
                $('.user_name_display').text('welcome, '+res.user_name + "!")
                document.getElementById('loginButtons').innerHTML = `
                <button type="button" class="btn btn-outline-dark shadow-none me-lg-2 me-2" onclick="logout()">Logout</button>
                `;
            } else if (res.status == 500) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: res.message
                });
            }
        }
    });
});
</script>



<script>
        $(document).on('submit', '#reg', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("save_reg", true);


            $.ajax({
                type: "POST",
                url: "php/register.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {

                    var res = jQuery.parseJSON(response);
                    if (res.status == 422) {
                        Swal.fire({
                            icon: 'error',
                            title: 'WARNING',
                            text: res.message
                        });

                    } else if (res.status == 200) {

                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: res.message
                        });

                    } else if (res.status == 500) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: res.message
                        });
                    }
                }
            });

        });
    </script>
  
</body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>




</html>