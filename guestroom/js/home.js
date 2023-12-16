document.addEventListener("DOMContentLoaded", function () {
    var swiper = new Swiper(".swiper-container", {
        spaceBetween: 30,
        effect: "fade",
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
            speed: 3000,
        }
    });
});

// $(document).on('submit', '#reg', function (e) {
//     e.preventDefault();

//     var formData = new FormData(this);
//     formData.append("save_reg", true);

//     $.ajax({
//         type: "POST",
//         url: "php/register.php",
//         data: formData,
//         processData: false,
//         contentType: false,
//         success: function (response) {
//             var res = jQuery.parseJSON(response);

//             if (res.status == 422) {
//                 Swal.fire({
//                     icon: 'error',
//                     title: 'WARNING',
//                     text: res.message
//                 });
//             } else if (res.status == 200) {
//                 Swal.fire({
//                     icon: 'success',
//                     title: 'Success',
//                     text: res.message
//                 });

//                 // Update the HTML to display the username
//                 $('#usernameDisplay').text('Welcome, ' + res.username);
//             } else if (res.status == 500) {
//                 Swal.fire({
//                     icon: 'error',
//                     title: 'Error',
//                     text: res.message
//                 });
//             }
//         }
//     });
// });

