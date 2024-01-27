<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "ngo";
$conn = new mysqli($servername, $username, $password,$database);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['ssubmit'])) {f1($conn);}
function f1($conn) {
  $F_Name = $_POST['F_Name'];
  $L_Name = $_POST['L_Name'];
  $Email = $_POST['Email'];
  $Contact_no = $_POST['Contact_no'];
  $Address = $_POST['Address'];
  $Fur_color = $_POST['Fur_color'];
  $Breed = $_POST['Breed'];
  $A_Gender = $_POST['A_Gender'];
  $Type = $_POST['Type'];
  $A_description = $_POST['A_description'];

  function validate($F_Name, $L_Name, $Email, $Contact_no, $Address)
  {
      if (!preg_match ("/^[a-zA-z]*$/", $F_Name) || (empty($F_Name)) ) {  
          $ErrMsg = "*Please Check First Name Correctly.";  
                  echo "<div style=\"color: red;\">$ErrMsg</div>" ;
                  
                  return false;
      }else
      if (!preg_match ("/^[a-zA-z]*$/", $L_Name) || (empty($L_Name)) ) {  
        $ErrMsg = "*Please Check Last Name Correctly.";  
                echo "<div style=\"color: red;\">$ErrMsg</div>" ;
                return false;
      }else
      if (!filter_var($Email, FILTER_VALIDATE_EMAIL) || (empty($Email)) ) {  
          $ErrMsg = "*Please Check Email Address Correctly.";  
          echo "<div style=\"color: red;\">$ErrMsg</div>" ;
                  return false;
      }else
      if (!preg_match("/^[+]?[1-9][0-9]{9,14}$/", $Contact_no) || (empty($Contact_no)) ) {  
          $ErrMsg = "*Please Check Contact Number Correctly.";  
          echo "<div style=\"color: red;\">$ErrMsg</div>" ;
                  return false;
      }else
      if ((empty($Address)) ) {  
          $ErrMsg = "*Please fill address.";  
          echo "<div style=\"color: red;\">$ErrMsg</div>" ;
                  return false;
      }else
      return true;
  } 
if(Validate($F_Name, $L_Name, $Email, $Contact_no, $Address)==true){
  $insert_person = "INSERT INTO `ngo`.`person` (`F_Name`, `L_Name`, `Email`, `Contact_no`, `Address`) VALUES ('$F_Name', '$L_Name', '$Email', '$Contact_no','$Address');";
  if ($conn->query($insert_person) == true) {
    //  echo "Success";
  } else {
     echo "ERROR: $insert_person <br> $conn->error";
  }
  sleep(2);
  $sql = "SELECT P_Id FROM ngo.`person` WHERE Email='$Email' AND Contact_no='$Contact_no';";
  $rs = $conn->query($sql);
   $row = $rs->fetch_assoc();
   $P_Id = $row['P_Id'];

  $insert_animal = "INSERT INTO `ngo`.`animal` (`Type`, `Fur_color`, `A_Gender`, `Breed`, `P_Id`, `Adopt_date`, `Date_found`, `Area_found`, `Area_Pin`) VALUES ('$Type', '$Fur_color',' $A_Gender', '$Breed', '$P_Id', NULL, NULL, NULL, NULL);";
  if ($conn->query($insert_animal) == true) {
    // echo "Success";
 } else {
    echo "ERROR: $insert_animal <br> $conn->error";
 }
 sleep(2);
 $sql1 = "SELECT A_Id FROM ngo.`animal` WHERE Type='$Type' AND P_Id='$P_Id' AND Breed='$Breed';";
 $rs1 = $conn->query($sql1);
  $row1 = $rs1->fetch_assoc();
  sleep(1);
  $A_Id = $row1['A_Id'];
  $insert_abuse ="INSERT INTO `ngo`.`abuse` (`A_Id`, `P_Id`, `A_description`) VALUES ('$A_Id', '$P_Id', '$A_description');";
  if ($conn->query($insert_abuse) == true) {
    // echo "Success";
 } else {
    echo "ERROR: $insert_abuse <br> $conn->error";
 }
}
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Forms</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fira+Sans+Condensed:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="img/shelter.png">
    <link rel="stylesheet" href="ngo.css">
  </head>
  <body>
    <header>
      <a href="NGO.php" class="logo" id=nav>NGO</a>
      <ul >
        <li>
          <a href="NGO.php" class="home" id=nav>Home</a></li>
          <li><a href="NGO.php" class="home" id=nav>About Us</a>  </li>
          <li><a href="NGO.php" class="home" id=nav>Contact Us</a>  </li>
      </ul>
    </header>

<div class="container6">
  <div class="container7">
  <ul class="nav nav-tabs" id=tab>
    <li class="nav-item">
      <a class="nav-link" href="form.php">Report Lost animal</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" href="form1.php">Report Abuse</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="form2.php">Adopt a pet</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="form3.php">Donate</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="form4.php">Volunteer</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="form5.php">Subscribe</a>
    </li></ul>
    <article class="name">
    Report Animal Abuse
    </article> <br>

    <form class="row g-3" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    <div class="col-md-6">
   <label for="name1" class="form-label">First Name</label>
      <input type="text" class="form-control" id="name1" name="F_Name" required>
    </div>
    <div class="col-md-6">
      <label for="name2" class="form-label">Last Name</label>
      <input type="text" class="form-control" id="name2" name="L_Name" required>
    </div>
    <div class="col-md-6">
   <label for="inputEmail4" class="form-label">Email</label>
      <input type="email" class="form-control" id="inputEmail4" name="Email" required>
    </div>
    <div class="col-md-6">
      <label for="no" class="form-label">Contact No.</label>
      <input type="tel" class="form-control" id="no" name="Contact_no" required>
    </div>
    <div class="col-12">
      <label for="inputAddress" class="form-label">Address</label>
      <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="Address">
    </div>
    <div class="col-12">
      <label for="inputAddress" class="form-label">Description</label>
      <input type="text" class="form-control" id="inputAddress" name="A_description">
    </div>
    
    <div class="col-3">
      <label for="inputfur" class="form-label">Fur Color</label>
      <input type="text" class="form-control" id="inputfur" name="Fur_color">
    </div>

    <div class="col-3">
      <label for="inputfur" class="form-label">Breed</label>
      <input type="text" class="form-control" id="inputfur" name="Breed">
    </div>

    <div class="col-md-2">
      <label for="animal" class="form-label">Animal</label> <br>
      <select id="inputState" class="form-select" name="Type">
      <option value="dog">Dog</option>
      <option value="cat">Cat</option>
      <option value="turtle">turtle</option>
      <option value="bird">bird</option>
    </select>

    </div>

    <div class="col-md-2">
      <label for="animal" class="form-label">Animal Gender</label></label>
      <select id="inputState" class="form-select" name="A_Gender">
      <option value="Male">Male</option>
      <option value="Female">Female</option>
    </select>

    </div>

    <div class="col-12">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="gridCheck" required>
        <label class="form-check-label" for="gridCheck">
          I understood and read the terms and conditions.
        </label> <br>
        <p20>*Only report if you have physically seen the abuse. Strict actions will be taken otherwise.</p20>
      </div>
    </div> <br>
    <div class="col-12">
      <button type="submit" class="btn btn-primary" name="ssubmit" id="ssubmit">Submit</button>
    </div>
  </form>

  </div>
</div>



    <script src="ngo.js" charset="utf-8"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
