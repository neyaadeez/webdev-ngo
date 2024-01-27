<?php
$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE ngo";
if ($conn->query($sql) === TRUE) {
  // echo "Database created successfully";
}

$person = "CREATE TABLE `ngo`.`person` (`P_Id` int(10) NOT NULL AUTO_INCREMENT,`F_Name` varchar(15) NOT NULL,`L_Name` varchar(15) DEFAULT NULL,`Email` varchar(40) DEFAULT NULL,`Contact_no` varchar(10) DEFAULT NULL,`Address` text DEFAULT NULL,PRIMARY KEY (`P_Id`))";
if ($conn->query($person) === TRUE) {
  // echo "Person table created successfully";
}

$donation ="CREATE TABLE `ngo`.`donation` (`D_Id` int(10) NOT NULL AUTO_INCREMENT,`Card_no` bigint(15) NOT NULL,`Card_Name` varchar(10) NOT NULL,`Exp_month` varchar(10) NOT NULL,`Exp_year` year(4) NOT NULL,`Amount` float NOT NULL,`P_Id` int(10) NOT NULL,PRIMARY KEY (`D_Id`),FOREIGN KEY(P_Id) REFERENCES person(P_Id))";
if ($conn->query($donation) === TRUE) {
  // echo "Donation table created successfully";
}

$activity = "CREATE TABLE `ngo`.`activity` (`Ac_Id` int(10) NOT NULL AUTO_INCREMENT,`Ac_Type` text NOT NULL,PRIMARY KEY(Ac_Id))";
if ($conn->query($activity) === TRUE) {
  // echo "Activity table created successfully";
}

$insert_activity ="INSERT INTO `ngo`.`activity` (`Ac_Id`, `Ac_Type`) VALUES(1, 'Taking Care of pets'),(2, 'Organize Fundraising Events'),(3, 'Planning Events');";
if ($conn->query($insert_activity) === TRUE) {
  // echo "Donation table created successfully";
}

$volunteer = "CREATE TABLE `ngo`.`volunteer` (`Ac_Id` int(10) NOT NULL,`P_Id` int(10) NOT NULL,`Age` int(10) NOT NULL, PRIMARY KEY(Ac_Id,P_Id),FOREIGN KEY(Ac_Id) REFERENCES activity(Ac_Id),FOREIGN KEY(P_Id) REFERENCES person(P_Id))";
if ($conn->query($volunteer) === TRUE) {
  // echo "Volunteer table created successfully";
}

$subscribe = "CREATE TABLE `ngo`.`subscribe` (`S_Id` int(10) NOT NULL AUTO_INCREMENT,`F_Name` varchar(10) NOT NULL,`L_Name` varchar(10) NOT NULL,`Email` varchar(35) NOT NULL,PRIMARY KEY(S_Id))";
if ($conn->query($subscribe) === TRUE) {
  // echo "Subscribe table created successfully";
}

$animal ="CREATE TABLE `ngo`.`animal` (`A_Id` int(10) NOT NULL AUTO_INCREMENT,`Type` varchar(10) NOT NULL,`Fur_color` varchar(10) DEFAULT NULL,`A_Gender` varchar(10) DEFAULT NULL,`Breed` varchar(15) DEFAULT NULL,`P_Id` int(10) DEFAULT NULL,`Adopt_date` date DEFAULT current_timestamp(),`Date_found` date DEFAULT current_timestamp(),`Area_found` text DEFAULT NULL,`Area_Pin` int(10) DEFAULT NULL,PRIMARY KEY(A_Id),FOREIGN KEY(P_Id) REFERENCES person(P_Id))";
if ($conn->query($animal) === TRUE) {
  // echo "Animal table created successfully";
}

$abuse = "CREATE TABLE `ngo`.`abuse` (`A_Id` int(10) NOT NULL,`P_Id` int(10) NOT NULL,`A_description` text DEFAULT NULL, PRIMARY KEY(A_Id,P_Id),
FOREIGN KEY(A_Id) REFERENCES animal(A_Id),FOREIGN KEY(P_Id) REFERENCES person(P_Id))";
if ($conn->query($abuse) === TRUE) {
  // echo "Abuse table created successfully";
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fira+Sans+Condensed:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>NGO</title>
    <link rel="icon" type="image/x-icon" href="img/shelter.png">
    <link rel="stylesheet" href="ngo.css">
  </head>
  <body>

<header>
  <a href="#" class="logo" id=nav>NGO</a>
  <ul >
    <li>
      <a href="#" class="home" id=nav>Home</a></li>
      <li><a href="#about" class="home" id=nav>About Us</a>  </li>
      <li><a href="#contact" class="home" id=nav>Contact Us</a>  </li>
  </ul>
</header>
<section>
  <p>
    We need them, just like they do. <br>
    Help us, Help them.
  </p>
</section>

<div class="container" id=cause>
<p1>Our causes</p1>

<div class="card-deck">
<div class="card" style="width: 18rem;">
  <img src="img/abuse.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Abuse</h5>
    <p2 class="card-text">Animal abuse in violent homes can take many forms and can occur for many reasons.</p>
  </div>
</div>
<div class="card" style="width: 18rem;">
  <img src="img/starvation.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Starvation</h5>
    <p2 class="card-text">Starvation and refeeding is most often a concern in animals subjected to cruelty and neglect.</p>
  </div>
</div>
<div class="card" style="width: 18rem;">
  <img src="img/rabies.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Disease</h5>
    <p2 class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>
</div> <br> <br>
<a href="form.php" class="abuse">Report -></a>

</div>

<div class="container2">
<p4>It's never too late to help. <br>
Any help is appreciated!</p4>

      <div class="card" style="width: 18rem;" id=donate>
        <img src="img/donation.png" class="card-img-top" id=donation>
        <div class="card-body">
          <h5 class="card-title">Donate</h5>
          <p2 class="card-text">Donate in form of money or treats! We accept all.</p> <br><br>
            <button type="button" name="button" onclick="window.location.href='form3.php'">Donate</button>
        </div>
        </div>

        <div class="card" style="width: 18rem;" id=volunteer>
          <img src="img/charity.png" class="card-img-top" id=volun>
          <div class="card-body">
            <h5 class="card-title">Volunteer</h5>
            <p2 class="card-text">Medical, Outdoor, pet-sitting volunteers are welcomed here!</p> <br><br>
              <button type="button" name="button" onclick="window.location.href='form4.php'">Volunteer</button>
          </div>
          </div>
      </div>

      <div class="container3" id=about>
        <p6>Meet Our Team!</p6> <br> <br> <br>
<img src="img/team1.jpg" id=team1><br /><span>Founder/CEO</span>
<div class="container4"> <p10>“</p10> <br>
   <p11> We are a collective of individuals who started this work because we are deeply concerned about the health of animals. We are striving to awaken humans by spreading kindness for all the animals.  Our foundation works towards animal protection, raising public awareness, and defending the rights of all non-human creatures. We believe that international NGOs can play a central role in bringing about solutions - but only if they fundamentally reset their focus.</p11>
<p12>”</p12>
</div>

<img src="img/team2.jpg" id=team2><br /><span1>Vice President</span1>
<img src="img/team3.jpg" id=team3><span2>Treasurer & Finance Committee Chair</span2>
<img src="img/team4.jpg" id=team4><span3>Secretary</span3>
</div>

<div class="container5" id=contact>
<img src="img/shelter.png" class="pic"> <span4>NGO</span4>
<p13>Contact us: <br />
     +91 9876543210  <br /> <br /> <br /> <br /><br />  <br /><br />Copyright © 2021 NGO.COM.
</p13>
<p14>Privacy Policy</p14> <p14>Cookie Policy</p14> <p14>Terms of Use</p14>
<p15>Find us here:  <br /> <br>
  3523 Jaskolski Rest, <br />Suite 646, 29928-2200,  <br />Port Matilde, Montana, <br /> United States.

</p15>
</div>


    <script src="ngo.js" charset="utf-8"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
