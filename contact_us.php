<?php
  session_start();     
	include("db.php");
  
  if(isset($_POST["sub"]))
  {
    $n=$_POST['name'];
    $em=$_POST['email'];
    $nu=$_POST['number'];    
    $cna=$_POST['cname'];    
    $mes=$_POST['message'];      
    $query=mysqli_query($con,"insert into feedback values('$n','$em',$nu,'$cna','$mes')");
    if ($query)
		{
        echo "<script type='text/javascript'> alert('Successfully Send')</script>";
    }
  }

    mysqli_commit($con);
    mysqli_close($con);
  
?>

<!DOCTYPE html >
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="css\contact_us.css">
  <title>Contact-Us</title>
</head>

<body>
  <form method="POST">
    <header>
      <div class="logo">
        <h1>Tourist adviser</h1>
      </div>
      <nav>
        <ul>
          <li><a href="index.html">Home</a></li>
          <li><a href="Destination.php">Destination</a></li>
          <li><a href="about.html">About Us</a></li>
          <li><a href="contact_us.php">Contact Us</a></li>
        </ul>
      </nav>
    </header>
    <div class="container">
      <h2>Contact_us</h2>
      <p>Need To Get Touch With Us? Either fill Out The From With Your Inquiry or Find the<a href="">
          touristadviser@gmail.com</a>You'd Liketo Contact below.</p>
      <div class="contact-box">
        <div class="contact-left">
          <h3><b>Sent your request</b></h3>
          <form>
            <div class="input-row">
              <div class="input-group">
                <label>Name*</label>
                <input type="text" placeholder="Enter Name" name="name" required>
              </div>
              <div class="input-group">
                <label>Email*</label>
                <input type="email" placeholder="Enter Email" name="email" required>
              </div>
            </div>
            <div class="input-row">
              <div class="input-group">
                <label>Phone*</label>
                <input type="Number" placeholder="Enter Number" name="number" required>
              </div>
              <div class="input-group">
                <label>Company Name*</label>
                <input type="text" placeholder="Enter Company Name"  name="cname">
              </div>
            </div>
            <label>Message*</label>
            <textarea rows="5" placeholder="Your Message" name="message" required></textarea>
            <div class="button"><button type="submit" class="anchor"  name="sub"><span class="booknow">Send</span></button></div>
          </form>

        </div>
        <div class="contact-right">
          <h3>Reach Us</h3>
          <table>
            <tr>
              <td><i class='bx bx-envelope'></i></td>
              <td>touristadviser@gmail.com</td>
            </tr>
            <tr>
              <td><i class='bx bxs-phone'></i></i></td>
              <td>+91 12345 67890</td>
            </tr>
            <tr>
              <td><i class='bx bxs-buildings'></i></td>
              <td>150 feet Ring Road,The Galleria Hotel Building, Umiyaji Chowk, Rajkot, Gujarat 360004</td>
            </tr>
          </table>


        </div>
      </div>
    </div>
    <!--footer-section -->
    <section class="fotter">
    <div class="box-container">

      <div class="line">
        <h3>quick link</h3>
        <a href="index.php"><i class='bx bx-chevron-right'></i>Home</a>
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
        <a href="https://maps.app.goo.gl/mGtxcKDKVALzwskw8"  target="_blank"><i class='bx bxs-buildings'></i>rajkot-gujrat</a>
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
  </form>
</body>

</html>