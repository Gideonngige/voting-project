<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="home.css">
    <title>home</title>
</head>
<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-sm navbar-dark   custom-navbar">
            <div class="container-fluid">
              <a class="navbar-brand" href="javascript:void(0)">Home</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav me-auto">
                  <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="register.php">Register</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="results.php">Results</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
<!--card parts-->
<div class="row">
  <div class="col-sm-3">
    <div class="countdown">
      <h3>Time Count Down</h3>
      <div class="time">
        <h4 id="timeDisplay">Hours  Minutes Seconds</h4>
      </div>
      <div class="ltext">
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad expedita odit eveniet. Fugiat, ipsum? Quo eveniet aliquam ea aperiam placeat minima unde delectus asperiores nulla iure, nihil deserunt, voluptatem magnam? </p>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
  <div class="login">
      <h3>Login to Vote</h3>
      <div class="loginText">
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad expedita odit eveniet. Fugiat, ipsum? Quo eveniet aliquam ea aperiam placeat minima unde delectus asperiores nulla iure, nihil deserunt, voluptatem magnam? </p>
      <table>
        <tr>
          <td><a href="login.php"><input type="submit" value="Login"  /></a></td>
          <td><a href="vote.php"><input type="submit" value="Vote"  /></a></td>
        </tr>
      </table>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
  <div class="register">
      <h3>Register, Login then Vote</h3>
      <div class="loginText">
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad expedita odit eveniet. Fugiat, ipsum? Quo eveniet aliquam ea aperiam placeat minima unde delectus asperiores nulla iure, nihil deserunt, voluptatem magnam? </p>
      <a href="register.php"><input type="submit" value="Register"  /></a>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
  <div class="results">
      <h3>See Results as People votes</h3>
      <div class="loginText">
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad expedita odit eveniet. Fugiat, ipsum? Quo eveniet aliquam ea aperiam placeat minima unde delectus asperiores nulla iure, nihil deserunt, voluptatem magnam? </p>
      <a href="results.php"><input type="submit" value="See results"  /></a>
      </div>
    </div>
  </div>
</div>

<!--slide show code-->

<div class="slideshow-container-fluid">

<div class="mySlides fade">
  <img src="assets/images/peace.png" style="width:100%; height:300px">
  <div class="text">Let's maintain Peace and love as we Vote</div>
</div>

<div class="mySlides fade">
  <img src="assets/images/register.png" style="width:100%; height:300px">
  <div class="text">Let's respect each other democratic opinion</div>
</div>

<div class="mySlides fade">
  <img src="assets/images/clock.png" style="width:100%;height:300px">
  <div class="text">It's everybody's right to vote</div>
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>

<!--end of slide show code-->
        

</div>
 
<script>
var timeDisplay = document.getElementById("timeDisplay");
var countDownDate = new Date("November 21, 2024 00:00:00").getTime();
var countdownFunction = setInterval(function() { var now = new Date().getTime(); 
  var distance = countDownDate - now; 
  // Time calculations for days, hours, minutes and seconds 
  var days = Math.floor(distance / (1000 * 60 * 60 * 24)); 
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)); 
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60)); 
  var seconds = Math.floor((distance % (1000 * 60)) / 1000); 
  // Display the result in the element with id="countdown" 
  document.getElementById("timeDisplay").innerHTML = days + "d " + hours + "h " + minutes + "m " + seconds + "s ";
  // If the countdown is over, write some text 
  if (distance < 0) { clearInterval(countdownFunction); document.getElementById("timeDisplay").innerHTML = "Election Day is here!"; } }, 1000);

  //slide show code
  let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 5 seconds
}
</script>
</body>
</html>