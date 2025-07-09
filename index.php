<html lang="en" method="POST">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="package/swiper-bundle.min.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <title>Home</title>
  <style>
    .modal {
      display: none;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0, 0, 0, 0.6);
    }

    .modal-content {
      background-color: rgb(107, 155, 167);
      margin: 10% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 35%;
      max-width: 500px;
      border-radius: 8px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
    }

    .close {
      color: white;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: snow;
      text-decoration: none;
      cursor: pointer;
    }

    #modal-title {
      margin: 10px;
      font-size: 28px;
      color: snow;
      margin-bottom: 10px;
    }

    #modal-description {
      color: black;
      margin: 10px;
      margin-top: 20px;
      font-size: 24px;
      line-height: 1.5;
    }
  </style>
</head>

<body>

  <!-- header section -->
  <header>
    <div class="logo">
      <h1>g</h1>
    </div>
    <nav>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="Destination.php">Destination</a></li>
        <li><a href="about.html">About Us</a></li>
        <li><a href="contact_us.php">Contact Us</a></li>
      </ul>
    </nav>
  </header>

  <!-- review-slider -->
  <div class="swiper mySwiper">
    <div class="swiper-wrapper">

      <div class="swiper-slide">
        <img src="Img/0_displayimg/home(1).jpeg">
        <div class="img-text-box">
          <h2> Exprience the desert with </h2>
          <h3>Kutch and Jaiselmer</h3>
          <div class="img-button">
            <a href="Kutchboking.php">Kutch</a>
            <a href="Jaisalmerboking.php">Jaiselmer</a>
          </div>
        </div>
      </div>

      <div class="swiper-slide">
        <img src="Img/0_displayimg/home(3).jpg">
        <div class="img-text-box3">
          <h2> Exprience the Snow with </h2>
          <h3> Manali and Leh-Ladakh </h3>
          <div class="img-button">
            <a href="Manaliboking.php">Manali</a>
            <a href="Lehladakhboking.php">Leh Ladakh</a>
          </div>
        </div>
      </div>

      <div class="swiper-slide">
        <img src="Img/0_displayimg/home(2).jpg">
        <div class="img-text-box2">
          <h2> Exprience the hill with </h2>
          <h3>Saputara and Matheran</h3>
          <div class="img-button">
            <a href="saputaraboking.php">Saputara</a>
            <a href="Matheranboking.php">Matheran</a>
          </div>
        </div>
      </div>

    </div>
  </div>

  <!-- Service section -->
  <div class="title">
    <h2>service we Provide</h2>
  </div>
  <div class="service">
    <div class="sevice-image">

      <div class="service-box"
        onclick="openModal('Campfire:', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Maxime, delectus beatae soluta possimus nobis tempora commodi corrupti at unde dolores, dolorem non nulla fugiat impedit. Sunt incidunt aliquid repellat voluptas praesentium culpa reprehenderit voluptatem aliquam tenetur neque eos, ut eius maxime minima! Ut quod perspiciatis sequi?.')">
        <img src="Img/0_displayimg/Campfire.png" width="75%">
        <h5>Campfire</h5>
      </div>

      <div class="service-box"
        onclick="openModal('Camping:', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Maxime, delectus beatae soluta possimus nobis tempora commodi corrupti at unde dolores, dolorem non nulla fugiat impedit. Sunt incidunt aliquid repellat voluptas praesentium culpa reprehenderit voluptatem aliquam tenetur neque eos, ut eius maxime minima! Ut quod perspiciatis sequi?.')">
        <img src="Img/0_displayimg/camping.png" width="75%">
        <h5>Camping</h5>
      </div>

      <div class="service-box"
        onclick="openModal('Mountain:', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Maxime, delectus beatae soluta possimus nobis tempora commodi corrupti at unde dolores, dolorem non nulla fugiat impedit. Sunt incidunt aliquid repellat voluptas praesentium culpa reprehenderit voluptatem aliquam tenetur neque eos, ut eius maxime minima! Ut quod perspiciatis sequi?.')">
        <img src="Img/0_displayimg/mountain.png" width="75%">
        <h5>Mountain</h5>
      </div>

      <div class="service-box"
        onclick="openModal('Offroad:', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Maxime, delectus beatae soluta possimus nobis tempora commodi corrupti at unde dolores, dolorem non nulla fugiat impedit. Sunt incidunt aliquid repellat voluptas praesentium culpa reprehenderit voluptatem aliquam tenetur neque eos, ut eius maxime minima! Ut quod perspiciatis sequi?.')">
        <img src="Img/0_displayimg/Off road.png" width="75%">
        <h5>Offroad</h5>
      </div>

      <div class="service-box"
        onclick="openModal('tour guide:', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Maxime, delectus beatae soluta possimus nobis tempora commodi corrupti at unde dolores, dolorem non nulla fugiat impedit. Sunt incidunt aliquid repellat voluptas praesentium culpa reprehenderit voluptatem aliquam tenetur neque eos, ut eius maxime minima! Ut quod perspiciatis sequi?.')">
        <img src="Img/0_displayimg/tour guide.png" width="75%">
        <h5>tour guide</h5>
      </div>

      <div class="service-box"
        onclick="openModal('tracking:', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Maxime, delectus beatae soluta possimus nobis tempora commodi corrupti at unde dolores, dolorem non nulla fugiat impedit. Sunt incidunt aliquid repellat voluptas praesentium culpa reprehenderit voluptatem aliquam tenetur neque eos, ut eius maxime minima! Ut quod perspiciatis sequi?.')">
        <img src="Img/0_displayimg/tracking.png" width="75%">
        <h5>tracking</h5>
      </div>
    </div>
  </div>
  <div id="modal" class="modal">
    <div class="modal-content">
      <span class="close" onclick="closeModal()">&times;</span>
      <h2 id="modal-title"></h2>
      <p id="modal-description"></p>
    </div>
  </div>
  <script>
    function openModal(title, description) {
      document.getElementById("modal-title").innerText = title;
      document.getElementById("modal-description").innerText = description;
      document.getElementById("modal").style.display = "block";
    }

    function closeModal() {
      document.getElementById("modal").style.display = "none";
    }

    // Close modal when clicking outside of the modal content
    window.onclick = function (event) {
      const modal = document.getElementById("modal");
      if (event.target == modal) {
        closeModal();
      }
    }
  </script>


  <!-- destination section -->
  <div class="title">
    <h2>Popular Destination</h2>
  </div>
  <div class="card-contener">
    <div class="card">
      <img src="Img/0_displayimg/Manali_1.jpg">
      <h1>Manali Adventure Camp _ With Kasol</h1>
      <div class="card-content">
        <p>❉ Summer , <i class='bx bxs-sun'>9</i>&nbsp;<i class='bx bxs-moon'>8</i></P>
        <p class="info">Manali is known streams and birdsong, forests and orchards and grandees of snow-capped
          mountains</p>
        <a href="Manaliboking.php" class="btn">Book now</a>
      </div>
    </div>
    <div class="card">
      <img src="Img/0_displayimg/Kedarnath_1.jpg">
      <h1>Kedarnath with Chpota-Tungnath Trek</h1>
      <div class="card-content">
        <p>❉ Summer , <i class='bx bxs-sun'>9</i>&nbsp;<i class='bx bxs-moon'>8</i></P>
        <p class="info">Kedarnath is known for Spirituality & Religious Enviroment its devine experince</p>
        <a href="kedarnathboking.php" class="btn">Book now</a>
      </div>
    </div>
    <div class="card">
      <img src="Img/0_displayimg/lehladakh(1).jpg">
      <h1>The Leh Ladakh Camaping & Road Trip</h1>
      <div class="card-content">
        <p>❉ Summer , <i class='bx bxs-sun'>15</i>&nbsp;<i class='bx bxs-moon'>14</i></P>
        <p class="info">Ladakh is most famous for breathtaking landscapes, the crystal clear skies, the highest
          mountain passes, </p>
        <a href="Lehladakhboking.php" class="btn">Book now</a>
      </div>
    </div>
  </div>
  <div class="explore-btn">
    <div class="button"><a href="Destination.php" class="anchor"><span>Load More</span></a></div>
  </div>

  <!-- review-slider -->
  <div class="title">
    <h2>Review section</h2>
  </div>
  <section class="swiper review-slider">
    <div class="swiper-wrapper">
      <div class="swiper-slide box">
        <img src="Img/0_displayimg/icon1.jpg" alt="Client 1">
        <h4>Narendra Modi</h4>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex delectus quas dolor autem expedita esse,
          ducimus
          consequuntur quidem quibusdam nesciunt minima repudiandae, obcaecati placeat quos!</p>
        <div class="star">
          <i class='bx bxs-star'></i>
          <i class='bx bxs-star'></i>
          <i class='bx bxs-star'></i>
          <i class='bx bxs-star'></i>
          <i class='bx bxs-star'></i>
        </div>
      </div>

      <div class="swiper-slide box">
        <img src="Img/0_displayimg/icon2.jpg" alt="Client 1">
        <h4>Rahul Gandhi</h4>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex delectus quas dolor autem expedita esse,
          ducimus
          consequuntur quidem quibusdam nesciunt minima repudiandae, obcaecati placeat quos!</p>
        <div class="star">
          <i class='bx bxs-star'></i>
          <i class='bx bxs-star'></i>
          <i class='bx bxs-star'></i>
          <i class='bx bxs-star'></i>
          <i class='bx bxs-star'></i>
        </div>
      </div>

      <div class="swiper-slide box">
        <img src="Img/0_displayimg/icon3.jpg" alt="Client 1">
        <h4>Arvind Kejriwal</h4>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex delectus quas dolor autem expedita esse,
          ducimus
          consequuntur quidem quibusdam nesciunt minima repudiandae, obcaecati placeat quos!</p>
        <div class="star">
          <i class='bx bxs-star'></i>
          <i class='bx bxs-star'></i>
          <i class='bx bxs-star'></i>
          <i class='bx bxs-star'></i>
          <i class='bx bxs-star'></i>
        </div>
      </div>

      <div class="swiper-slide box">
        <img src="Img/0_displayimg/icon4.jpg" alt="Client 1">
        <h4>Yogi Adityanath</h4>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex delectus quas dolor autem expedita esse,
          ducimus
          consequuntur quidem quibusdam nesciunt minima repudiandae, obcaecati placeat quos!</p>
        <div class="star">
          <i class='bx bxs-star'></i>
          <i class='bx bxs-star'></i>
          <i class='bx bxs-star'></i>
          <i class='bx bxs-star'></i>
          <i class='bx bxs-star'></i>
        </div>
      </div>

      <div class="swiper-slide box">
        <img src="Img/0_displayimg/icon5.jpg" alt="Client 1">
        <h4>Akhilesh Yadav</h4>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex delectus quas dolor autem expedita esse,
          ducimus
          consequuntur quidem quibusdam nesciunt minima repudiandae, obcaecati placeat quos!</p>
        <div class="star">
          <i class='bx bxs-star'></i>
          <i class='bx bxs-star'></i>
          <i class='bx bxs-star'></i>
          <i class='bx bxs-star'></i>
          <i class='bx bxs-star'></i>
        </div>
      </div>

      <div class="swiper-slide box">
        <img src="Img/0_displayimg/icon6.jpg" alt="Client 1">
        <h4>Bhupendra Patel</h4>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex delectus quas dolor autem expedita esse,
          ducimus
          consequuntur quidem quibusdam nesciunt minima repudiandae, obcaecati placeat quos!</p>
        <div class="star">
          <i class='bx bxs-star'></i>
          <i class='bx bxs-star'></i>
          <i class='bx bxs-star'></i>
          <i class='bx bxs-star'></i>
          <i class='bx bxs-star'></i>
        </div>
      </div>
    </div>
  </section>

  <!--footer-slider -->
  <section class="fotter">
    <div class="box-container">

      <div class="line">
        <h3>quick link</h3>
        <a href="index.php"><i class='bx bx-chevron-right'></i></i>Home</a>
        <a href="Destination.php"><i class='bx bx-chevron-right'></i>Destination</a>
        <a href="about.html"><i class='bx bx-chevron-right'></i>About_us</a>
        <a href="contact_us.php"><i class='bx bx-chevron-right'></i>Contact_us</a>
      </div>

      <div class="line">
        <h3>extra link</h3>
        <a href="contact_us.php"><i class='bx bx-chevron-right'></i>Ask Question</a>
        <a href="contact_us.php"><i class='bx bx-chevron-right'></i>Message Us</a>
        <a href="#"><i class='bx bx-chevron-right'></i>terms of use</a>
        <a href="#"><i class='bx bx-chevron-right'></i>Privacy policy</a>
      </div>

      <div class="line">
        <h3>contact info</h3>
        <a href="#"><i class='bx bxs-phone'></i>+91 12345 67890</a>
        <a href="#"><i class='bx bxs-phone'></i>+91 54321 09876</a>
        <a href="https://www.gmail.com/" target="_blank"><i class='bx bx-envelope'></i>touristadviser@gmail.com</a>
        <a href="https://maps.app.goo.gl/mGtxcKDKVALzwskw8" target="_blank"><i
            class='bx bxs-buildings'></i>rajkot-gujarat</a>
      </div>

      <div class="line">
        <h3>contact info</h3>
        <a href="https://www.instagram.com/" target="_blank"><i class='bx bxl-instagram'></i>instagram</a>
        <a href="https://www.facebook.com/" target="_blank"><i class='bx bxl-facebook-circle'></i>facebook</a>
        <a href="https://x.com/" target="_blank"><i class='bx bxl-twitter'></i>twitter</i></a>
        <a href="https://www.linkedin.com/" target="_blank"><i class='bx bxl-linkedin-square'></i>linkdin</a>
      </div>

    </div>
    <div class="credit">Created by <span> P&U Company</span> | all right reserved! |</div>
  </section>

  <!-- common slider script    -->
  <script src="package/swiper-bundle.min.js"></script>
  <!-- image-slider script -->
  <script>
    var swiper = new Swiper(".mySwiper", {
      spaceBetween: 30,
      centeredSlides: true,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
  </script>
  <!-- common slider script    -->
  <script src="package/swiper-bundle.min.js"></script>
  <!-- review-slider script -->
  <script>
    var swiper = new Swiper(".review-slider", {
      slidesPerView: 3,
      spaceBetween: 30,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });
  </script>

</body>

</html>