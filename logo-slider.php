
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
  <style>
    /* Add any custom styles for the sliders */
    .slider {
      width: 100%;
      margin: 0 auto;
    }

    .slider img {
      width: 100%;
      height: auto;
    }
    .slick-track{
        display: flex;
    gap: 40px;
    }
    .second-slide{
        margin:0 150px 100px 150px;
        
    }

  </style>
  <title>Two Logo Sliders using Slick Carousel</title>
</head>
<body>
<div class="silder-con">
  <div class="slider forward-slider mt-5">
  <div><img src="assets/img/Placement-Logos/logo1.png" alt="Logo "></div>
    <div><img src="assets/img/Placement-Logos/logo2.png" alt="Logo 5"></div>
    <div><img src="assets/img/Placement-Logos/logo3.png" alt="Logo 4"></div>
    <div><img src="assets/img/Placement-Logos/logo4.png" alt="Logo 4"></div>
    <div><img src="assets/img/Placement-Logos/logo5.png" alt="Logo 4"></div>
    <div><img src="assets/img/Placement-Logos/logo6.png" alt="Logo 4"></div>
    <div><img src="assets/img/Placement-Logos/logo13.png" alt="Logo 4"></div>
    <div><img src="assets/img/Placement-Logos/logo14.png" alt="Logo 4"></div>
    <div><img src="assets/img/Placement-Logos/logo15.png" alt="Logo 4"></div>
    <!-- Add more slides as needed -->
  </div>

  <div class="slider forward-slider mt-5 second-slide">
  <div><img src="assets/img/Placement-Logos/logo7.png" alt="Logo 6"></div>
    <div><img src="assets/img/Placement-Logos/logo8.png" alt="Logo 5"></div>
    <div><img src="assets/img/Placement-Logos/logo9.png" alt="Logo 4"></div>
    <div><img src="assets/img/Placement-Logos/logo10.png" alt="Logo 4"></div>
    <div><img src="assets/img/Placement-Logos/logo11.png" alt="Logo 4"></div>
    <div><img src="assets/img/Placement-Logos/logo12.png" alt="Logo 4"></div>
    <div><img src="assets/img/Placement-Logos/logo16.png" alt="Logo 4"></div>
    <div><img src="assets/img/Placement-Logos/logo17.png" alt="Logo 4"></div>
    <div><img src="assets/img/Placement-Logos/logo18.png" alt="Logo 4"></div>
    <!-- Add more slides as needed -->
  </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
  <script>
    // Initialize Slick Carousel for the forward slider
    $('.forward-slider').slick({
      autoplay: true,
      autoplaySpeed: 1000,
      slidesToShow: 5,
      slidesToScroll: 1,
      arrows: false,
      dots: false,
    });

  </script>

</body>
</html>
