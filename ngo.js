function validateForm() {
  document.getElementById("error").innerHTML="";
  let x = document.getElementById("name1").value;
  if ((x == "/") || (x == "@")) {
    document.getElementById("cognito").innerHTML="First Name incorrect";
    return false;
  }
  let y = document.getElementById("name2").value;
  if ((y == "/") || (y == "@")) {
    document.getElementById("error").innerHTML="Last Name incorrect";
    return false;
  }
  let z = document.forms["form1"]["add"].value;
  if ((z == "/") || (z == "@")) {
    document.getElementById("error").innerHTML="Address Incorrect";
    return false;
  }
  let e = document.getElementById("inputEmail4").value;
  if ((e == "/") || (e == "'")) {
    document.getElementById("error").innerHTML="Email Incorrect";
    return false;
  }

  let q = document.getElementById("no").value;
  if (q.toString().length==10) {
    document.getElementById("error").innerHTML="Number must be 10 numbers";
    return false;
  }
}
function ValidateEmail() 
{
if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.getElementById("inputEmail4").value))
    return (true);
else{
    document.getElementById("error").innerHTML="Enter Correct Email ID";
    return (false);
}
}

function phonenumber(){
  var phoneno = /^\d{10}$/;
  if(document.getElementById("no").value.match(phoneno)){
              return true;
  }
  else
          {
              document.getElementById("error").innerHTML = "please enter correct phone number";
              return false;
          }
  }