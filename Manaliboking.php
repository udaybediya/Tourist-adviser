<?php
session_start();

include("db.php");

if (isset($_POST["sub"])) {
  $fn = $_POST['fname'];
  $ag = $_POST['age'];
  $nu = $_POST['number'];
  $em = $_POST['email'];
  $da = $_POST['date'];
  $no = $_POST['nop'];
  $pic = $_POST['pic'];
  $gen = $_POST['gen'];
  $des = $_POST['des'];
  $to = $_POST['tot'];

  $query = mysqli_query($con, "insert into booking values('$fn',$ag,'$nu','$em','$da',$no,'$pic','$gen','$des','$to')");

  if ($query) {
    echo "<script type='text/javascript'> alert('Successfully Booking')</script>";
  }


  mysqli_commit($con);
  mysqli_close($con);
}

?>



<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Manali Adventure Camp _ With Kasol</title>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
  <style>
    * {
      box-sizing: border-box
    }

    body {
      font-family: Verdana, sans-serif;
      margin: 0
    }

    .mySlides {
      display: none
    }

    img {
      vertical-align: middle;
    }

    /* Slideshow container */
    .slideshow-container {
      border: 2px solid white;
      padding-top: 1px;
      max-width: 1000px;
      position: relative;
      margin: auto;
    }

    /* Next & previous buttons */
    .prev,
    .next {
      cursor: pointer;
      position: absolute;
      top: 35%;
      width: auto;
      padding: 16px;
      margin-top: -22px;
      color: white;
      font-weight: bold;
      font-size: 18px;
      transition: 0.5s ease;
      border-radius: 0 3px 3px 0;
      user-select: none;
    }

    /* container-image-text */
    .container-image-text {
      position: relative;

    }

    .iamge-text {
      padding: 2%;
      width: 100%;
      position: relative;
      margin-top: 1%;
      border: 2px solid rgb(107, 155, 167);
    }

    /* button */
    .button {
      position: relative;
      left: 75%;
    }

    .anchor {
      text-decoration: none;
      color: #fff;
      display: inline-block;
      font-family: sans-serif;
      font-weight: 600;
      border-radius: 50px;
      border: 2px solid rgb(107, 155, 167);
      padding: 14px 40px 13px;
      overflow: hidden;
      position: relative;
    }

    .anchor:hover {
      color: #4e484a;
    }

    .button a::before {
      position: absolute;
      content: "";
      z-index: 0;
      background-color: rgb(107, 155, 167);
      left: -5px;
      right: -5px;
      bottom: -5px;
      height: 111%;
      transition: all .3s ease;
    }

    .button button::before {
      position: absolute;
      content: "";
      z-index: 0;
      background-color: rgb(107, 155, 167);
      left: -5px;
      right: -5px;
      bottom: -5px;
      height: 115%;
      transition: all .3s ease;
    }

    .button a:hover::before {
      height: 13%;
    }

    .button button:hover::before {
      height: 13%;
    }

    .button span {
      position: relative;
      z-index: 2;
      transition: all .3s ease;
    }

    /* booking form */
    .form-container {
      padding: 1%;
      border: 2px solid rgb(107, 155, 167);
      width: 52.7%;
      margin-left: 23.7%;
      position: relative;
      margin-top: 1%;
    }

    .form-container h3 {
      color: black;
      text-align: center;
    }

    .input-row {
      display: flex;
      padding: 1.5%;
      justify-content: space-between;
      margin-bottom: 20pxs;
    }

    .input-row .input-group {
      flex-basis: 45%;
    }

    input {
      width: 100%;
      border: none;
      border-bottom: 1px solid #ccc;
      outline: none;
      padding-bottom: 10px;
    }

    label {
      color: #333;
      font-weight: 500;
      margin-bottom: 10px;
      display: block;
    }

    #Pick-Up {
      width: 100%;
      height: 60%;
    }

    #destination {
      width: 100%;
      height: 60%;
    }

    #Gender {
      width: 100%;
      height: 60%;
    }

    #totalamount {
      margin-left: 1%;
    }

    .title {
      width: 100%;
      margin: 0 auto;
      padding: 1px;
    }

    .hero {
      background-color: rgb(107, 155, 167);
      background-size: 1vh;
      background-position: right;
      text-align: center;
    }

    .hero h4 {
      color: #fff;
      font-size: 20px;
      padding-left: 1%;
    }

    h3::after {
      content: "";
      position: absolute;
      margin-left: 40%;
      width: 16%;
      height: 2px;
      display: block;
      background-color: rgb(107, 155, 167);
    }

    .price {
      color: black;
    }

    .bxbxs-sun {
      font-weight: 400;
    }

    .bxbxs-moon {
      font-weight: 400;
    }

    /* Position the "next button" to the right */
    .next {
      right: 0;
      border-radius: 3px 0 0 3px;
    }

    /* On hover, add a black background color with a little bit see-through */
    .prev:hover,
    .next:hover {
      background-color: rgb(107, 155, 167);
    }

    /* The dots/bullets/indicators */
    .dot {
      transition: background-color 0.5s ease;
    }

    .active,
    .dot:hover {
      background-color: #717171;
    }

    /* Fading animation */
    .fade {
      animation-name: fade;
      animation-duration: 0.5s;
    }

    @keyframes fade {
      from {
        opacity: .4
      }

      to {
        opacity: 1
      }
    }

    /* On smaller screens, decrease text size */
    @media only screen and (max-width: 300px) {

      .prev,
      .next,
      .text {
        font-size: 11px
      }
    }

    .ui-datepicker {
      background: white;
      /* Background color of the datepicker */
      color: black;
      /* Text color */
    }

    .ui-datepicker .ui-datepicker-calendar td {
      visibility: hidden;
    }

    .ui-datepicker .ui-datepicker-calendar td.selectable {
      visibility: visible;
      color: white;
    }

    .ui-datepicker .ui-datepicker-header {
      color: black;
    }

    .ui-datepicker a {
      color: black;
    }

    .ui-datepicker a:hover {
      background: #888;
    }
  </style>
</head>

<body>
  <form method="POST">
    <section class="hero">
      <div class="title">
        <h4>Manali Adventure Camp _ With Kasol &nbsp; &nbsp;<span class="price">₹9500/- Per Person</span></h4>
      </div>
    </section>
    <div class="slideshow-container">
      <div class="mySlides fade">
        <img src="Img/7_manali/manali(1).png" style="width:100%">
      </div>
      <div class="mySlides fade">
        <img src="Img/7_manali/manali(2).png" style="width:100%">
      </div>
      <div class="mySlides fade">
        <img src="Img/7_manali/manali(3).png" style="width:100%">
      </div>
      <div class="mySlides fade">
        <img src="Img/7_manali/manali(4).png" style="width:100%">
      </div>
      <div class="mySlides fade">
        <img src="Img/7_manali/manali(6).png" style="width:100%">
      </div>
      <div class="mySlides fade">
        <img src="Img/7_manali/manali(5).png" style="width:100%">
      </div>

      <a class="prev" onclick="plusSlides(-1)">❮</a>
      <a class="next" onclick="plusSlides(1)">❯</a>

      <div class="iamge-text">
        <p style="color: black;"><b>Manali Adventure Camp _ With Kasol</b></p>
        <i class='bx bxs-sun'>9</i>&nbsp;<i class='bx bxs-moon'>8</i>
        <p style="color: #666;">Kullu Manali, one of Himachal Pradesh's most popular tourist places, attracts visitors
          of all kinds. It is no surprise that natural attractions rank among the top places to visit in Kullu Manali,
          given their variety of snow-capped peaks, charming rivers, and green valleys.There are numerous areas where
          visitors may engage in activities like paragliding, skiing, rafting, and trekking. With its year-round
          pleasant weather, snow-capped mountains, undulating green valleys, and flowing rivers, Kullu Manali is a
          popular destination for honeymooners and families. Here is a list of some of the top Kullu Manali attractions
          that will make your vacation special.</p>
        <div class="button"><a href="Img/7_manali/Manali Adventure Camp _ With Kasol.pdf" class="anchor"><span>Download
              Brochure</span></a></div>
      </div>

    </div>
    <div class="form-container">
      <h3><b>Book Package</b></h3>
      <form id="bookingForm">
        <div class="input-row">
          <div class="input-group">
            <label>Full Name</label>
            <input type="text" placeholder="Enter Name" name="fname" id="fullName" required>
          </div>
          <div class="input-group">
            <label>Age*</label>
            <input type="number" placeholder="Enter Age" name="age" id="age" required min="18">
          </div>
        </div>
        <div class="input-row">
          <div class="input-group">
            <label>Phone*</label>
            <input type="number" placeholder="Enter Number" name="number" id="phone" required>
          </div>
          <div class="input-group">
            <label>Email*</label>
            <input type="email" placeholder="Enter email address" name="email" id="email" required>
            <script>
$(function() {
    $("#date").datepicker({
        minDate: 0, // Prevents selecting dates before today
        beforeShowDay: function(date) {
            const day = date.getDate();
            return [(day === 7 || day === 14 || day === 21 || day === 28), 'selectable'];
        },
        dateFormat: 'dd/mm/yy', // Set the date format for display
        onSelect: function(dateText) {
            const [month, day, year] = dateText.split('/');
            $(this).val(`${day}/${month}/${year}`); // Format it to dd/mm/yyyy
        }
    }).focus(function() {
        $(this).datepicker("show");
    });
});
            </script>
          </div>
        </div>
        <div class="input-row">
          <div class="input-group">
          <label for="date">Date*</label>
          <input type="text" placeholder="Enter date" name="date" id="date" required>
          </div>
          <div class="input-group">
            <label>Number Of People* </label>
            <input type="number" id="numPeople" name="nop" required>
          </div>
        </div>
        <div class="input-row">
          <div class="input-group">
            <label>Pick-Up*</label>
            <select id="Pick-Up" placeholder="Select Pick-Up point" name="pic" required>
              <option value="Rajkot" selected>Rajkot</option>
            </select>
          </div>
          <div class="input-group">
            <label>Gender*</label>
            <select id="Gender" placeholder="Gender" name="gen" required>
              <option value="Male" selected>Male </option>
              <option value="Female">Female</option>
            </select>
          </div>
        </div>
        <div class="input-row">
          <div class="input-group">
            <label>Destination*</label>
            <select id="destination" placeholder="Select destination" name="des" required>
              <option value="">Select Destination</option>
              <option value="Manali Adventure Camp _ With Kasol" selected >Manali Adventure Camp _ With Kasol</option>
            </select>
          </div>
          <div class="input-group">
            <label for="totalAmount" id="total amount">Total Amount</label>
            <input type="text" id="totalAmount" name="tot" readonly>
          </div>
          <!-- Updated JavaScript for calculation -->
          <script>
            const amountPerPerson = 9500;

            function updateTotalAmount() {
              const numPeople = document.getElementById('numPeople').value;
              if (numPeople) {
                const totalAmount = numPeople * amountPerPerson;
                document.getElementById('totalAmount').value = '₹' + totalAmount.toFixed(2);
              } else {
                document.getElementById('totalAmount').value = '';
              }
            }

            document.getElementById('numPeople').addEventListener('input', updateTotalAmount);
          </script>
        </div>
        <div class="button"><button type="submit" class="anchor" id="bookNow" name="sub"><span class="booknow">Book
              Now</span></button></div>
      </form>
    </div>

    <br>
  </form>
  <!-- bill-js  -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
  <script src="js/swiper_js.js"></script>
  <script src="js/bokking_js.js"></script>
</body>

</html>