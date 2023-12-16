<!doctype html>

<html lang="en">
<head>
    <title>Rooms</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital@1&family=Merienda:wght@400;700&family=Poppins:ital,wght@1,400;1,500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.15.0/font/bootstrap-icons.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

  <body>
    <?php include('php/show.php'); ?>
    <div class="container mt-3">
    <div class="card mb-3">
      <img src="uploads/<?php echo $rooms['photo'];?>" class="card-img-top" alt="image loading">
      <div class="card-body">
      <h2 class="mt-3  mb-4 text-center fw-bold wer1">Details of <i class="bi bi-houses-fill"></i>Hotel</h2>
        <h4 class="card-text">Hotel Name :  <span style="font-family: 'Josefin Sans', sans-serif;"><?php echo $rooms['hname'];?></span></h4>
        <h4 class="card-text" >Price :  <span id="pr" style="font-family: 'Josefin Sans', sans-serif;"><?php echo $rooms['price'];?></span></h4>
        <h4 class="card-text">Maximun Count :  <span style="font-family: 'Josefin Sans', sans-serif;"><?php echo $rooms['maxCount'];?></span></h4>
        <h4 class="card-text">No.of.Rooms :  <span style="font-family: 'Josefin Sans', sans-serif;"><?php echo $rooms['nrom'];?></span></h4>
        <h4 class="card-text">Bed Type :  <span style="font-family: 'Josefin Sans', sans-serif;"><?php echo $rooms['cart'];?></span></h4>
        <h2 class="mt-3  mb-4 text-center fw-bold wer1">Book the Rooms</h2>
      <form enctype="multipart/form-data" data-remote="true" id="reg">
        <div class="col-md-6 mb-3">
          <label class="form-label"><i class="bi bi-people-fill"></i> Family member Count</label>
          <input type="number" name="maxCount" class="form-control shadow-none" placeholder="Family members count" required>
      </div>
      <div class="col-lg-3 mb-3">
        <label class="form-label home1">Name :</label>
        <input type="text" name="name" class="form-control shadow-none" placeholder="Enter your">
    </div>
      <div class="col-lg-3 mb-3">
          <label class="form-label home1">Check-in :</label>
          <input type="date" id="d1" name="ciDate"class="form-control shadow-none">
      </div>
      <div class="col-lg-3 mb-3">
          <label class="form-label home1">Check-out :</label>
          <input type="date" id="d2" name="coDate" class="form-control shadow-none">
      </div>

    <div class="col-md-6 mb-3">
          <label class="form-label shadow-none">Amount :</label>
          <span id="amt"></span>
          <?php echo "<script>
          function myFunction(value)
          {
            const d1 = new Date(document.getElementById('d1').value);
            const d2 = new Date(document.getElementById('d2').value);
            // Calculate the time difference in milliseconds
            const timeDifference = Math.abs(d2.getTime() - d1.getTime());
          
            // Convert the time difference to days
            const daysDifference = Math.floor(timeDifference / (1000 * 60 * 60 * 24));
            var amount= Number(document.getElementById('pr').innerHTML)*daysDifference;
            document.getElementById('amt').innerHTML=amount;
          }

  // Get the input element
    const myInput = document.getElementById('d2');

    // Add an event listener to detect changes in the input value
    myInput.addEventListener('input', function() {
      // Call the function with the input value
      myFunction(myInput.value);
    });
          </script>"?>
      </div>
       <button type="submit" class="btn btn-outline-dark shadow-none"> Book Now</button> <a href="index.php" class="btn btn-outline-dark shadow-none">Back</a>


      </div>
</form>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        $(document).on('submit', '#reg', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("save_reg", true);

            $.ajax({
                type: "POST",
                url: "php/book.php",
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


  </body>
</html>
