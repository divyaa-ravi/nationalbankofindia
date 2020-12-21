<!DOCTYPE html>
<html>
 <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="foot.css">  
  <style>
      body {
        margin: 0; 
        font-family: Arial, Helvetica, sans-serif;
      }

      * {
        box-sizing: border-box;
      }

      .container {
        position: relative;
        width: auto;
      }

      .topnav {
        overflow: hidden;
        background-color: #383838;
        
      }

      .topnav a {
        float: left;
        color: #f2f2f2;
        text-align: center;
        padding: 14px 36px;
        text-decoration: none;
        font-size: 17px;
      }

      .topnav a:hover {
        background-color: #ddd;
        color: black;
      }

      input[type=text], select, textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
      }

      input[type=submit] {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
      }

      input[type=submit]:hover {
        background-color: #45a049;
      }

      .contain {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
      }

  </style>
 </head>

 <body>
  <div class="container">
    <div class="topnav">
      <a>NBI<i class="fa fa-fw fa-bank"></i></a>
      <a href="home.php" target="_parent">Home</a>
      <a href="contactus.php" target="_parent">Contact</a>
      <a href="aboutus.php" target="_parent">About</a>
      <a href="customer1.php"target="_parent">View Customers</a> 
    </div>
  </div>

  <h3>Contact Us</h3>
 <form action="contactus.php" method="post">
  <div class="contain">
   
    <label> Name</label>
    <input type="text" name="name" placeholder="Your name..">
    <label>E-mail</label> 
    <input type="text" name="email" placeholder="Your email id.."> 
    <label>Message</label>
    <textarea name="message" placeholder="Leave a message.." style="height:200px"></textarea>
    <button type="submit" name="send" class="btn btn-danger">Submit</button>
   </form>
  </div>

 <br><br>

 <footer class="footer-distributed">
  <div class="footer-left">
   <h3><span>National Bank of India</span></h3>
    <p class="footer-links">
     <a href="home.php" class="link-1">Home</a>
     <a href="aboutus.php">About</a>
     <a href="contactus.php">Contact Us</a>
    </p>

    <p class="footer-company-name"> ©2020 Created by Divya.All rights reserved</p>
  </div>
 
  <div class="footer-center">
   <div>
    <i class="fa fa-map-marker"></i>
    <p><span>#23 HAL Old Airport Rd</span> Kodihalli, Bengaluru, Karnataka</p>
   </div>

   <br>
   <div>
     <i class="fa fa-phone"></i>
     <p>080 25230763</p>
   </div>
  
   <br>
   <div>
    <i class="fa fa-envelope"></i>
    <p><a href="mailto:nbi@gmail.com">nbi@gmail.com</a></p>
   </div>
 </div>
  <div class="footer-right">

    <p class="footer-company-about">
      <span>About NBI</span>
      NBI Bank is a leading public sector bank in India. The Bank’s consolidated total assets stood at Rs. 14.76 trillion at September 30, 2020. 
    </p>

    <div class="footer-icons"> 
      <a href="https://www.youtube.com/"><i class="fa fa-youtube"></i></a>
      <a href="https://www.github.com/"><i class="fa fa-github"></i></a>  
      <a href="https://www.linkedin.com/"><i class="fa fa-linkedin"></i></a>  
      <a href="https://www.instagram.com/"><i class="fa fa-instagram"></i></a> 
    </div>

   </div>

  </footer> 
 </body>
</html>

<?php
$connection = mysqli_connect("localhost","root",""); 
$db = mysqli_select_db($connection,'intern'); 


if(isset($_POST['send'])){
      $name=$_POST['name'];
      $email=$_POST['email'];
      $message=$_POST['message'];

      $query = "INSERT INTO contact (name,email,message) VALUES ('$name','$email','$message')";
      $query_run = mysqli_query($connection,$query) or die("could not ");


if($query_run)
{
   echo "<script type='text/javascript'>alert('Thank You for your valuable message!!');
   window.location='contactus.php';</script>";
   
}
else
{
    echo '<script> alert("Try Again! Your message submission failed"); </script>';   
}

}
?>
