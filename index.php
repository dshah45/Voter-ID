<!DOCTYPE html>
<html>
<title>Voter-ID</title>
<link rel="title icon" type="image/png" href="images/title-img.png"/>
    <link rel="stylesheet" type="text/css" href="style1.css">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!-- ICON NEEDS FONT AWESOME FOR CHEVRON UP ICON -->
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous"></script>
<style>


/* Full height image header */
.bgimg-1 {
  background-position: center;
  background-size: cover;
  background-image: url("vt.jpg");
  min-height: 100%;
}

.w3-bar .w3-button {
  padding: 16px;
}
.image1 {
height : 75px;
width : 75px;

}
.w3-image {
    max-width: 100%;
    height: 280px;
}


.fa-info-circle,.fa-user {
  font-size:300px;
  color:#007bff;
}


#myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  font-size: 18px;
  border: none;
  outline: none;
  background-color: #007bff;
  color: white;
  cursor: pointer;
  padding: 0px;
  border-radius: 50%;
  height: 50px;
  width: 50px;


}

#myBtn:hover {
    background-color: #000000;
     opacity:1;
     transition: 0.5s;
  -moz-transition: 0.5s;
  -webkit-transition: 0.5s;
  -o-transition: 0.5s;
}
</style>
<body>

<?php include('amaterasu.php') ?>

<?php include('car.php') ?>

<!-- First Grid -->
<div class="w3-row-padding w3-padding-64 w3-container">
  <div class="w3-content">
    <div class="w3-twothird">
      <h1>Information</h1>
      <h5 class="w3-padding-32">The importance of voting is lost amongst the hustle and bustle of city life. While everyone sits and complains about this and that, and makes suggestions that the government should change this and that, the elections come and go without half the population paying attention.</h5>

      <p class="w3-text-grey">The highest recorded voter turnout in India was recorded in 2014 for the Lok Sabha elections at 66.4%. That means close to half the population does not exercise their right to vote.Your vote can play an important part in making the change. If you are unhappy with the current government, you can vote for a better one. Not voting could result in the same party ruling for another five years. At the end of the day, if the country is stuck with a bad government, it’s the people to blame for voting wrong or for not voting at all.Every citizen who is 18 years old on the qualifying date (January 1 of the year in case) unless disqualified, is eligible to be enrolled.</p>
    </div>

    <div class="w3-third w3-center">
      <i class="fa fa-info-circle w3-padding-64"></i>
    </div>
  </div>
</div>

<!-- Second Grid -->
<div class="w3-row-padding w3-padding-64">
  <div class="w3-content">
     <div class="w3-third w3-center">
      <i class="fa fa-user w3-padding-64 "></i>
    </div>
    <div class="w3-twothird">
      <a id="about"><h1>About Us</h1></a>
      <h5 class="w3-padding-32">India is a Socialist, Secular, Democratic Republic and the largest democracy in the World. The modern Indian nation state came into existence on 15th of August 1947. Since then free and fair elections have been held at regular intervals as per the principles enshrined in the Constitution, Electoral Laws and System.</h5>

      <p class="w3-text-grey">The Voter-Id is neccessary for each one living in India.It act as a proof as identity of living in India and can also help to cast Vote in the Election. We here provide the user a Generated copy of Voter-Id which is to be verified by  Election Comission Office and can be used to vote. User Interface is reduced to create Voter-Id and it is also fast and efficient.</p>
    </div>
  </div>
</div>


<!-- Promo Section - "We know design" -->
<div class="w3-container w3-light-grey" style="padding:128px 16px">
  <div class="w3-row-padding">
    <div class="w3-col m6">
      <h3>Know How to Apply?</h3>
      <p>Click on below link  to view the Registration Process.</p>
      <p><a href= "user manual.pdf" class="w3-button w3-black"><i class="fa fa-question-circle"> </i> View Sample</a></p>
    </div>
    <div class="w3-col m6">
      <img class="w3-image w3-round-large" src="img.jpg" alt="Buildings">
    </div>
  </div>
</div>
<!-- Return to Top -->



<button onclick="topFunction()" id="myBtn"><i class="fas fa-arrow-up"></i></button>






<!-- Footer -->
<?php include('footer.php') ?>
<script>
// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}


// Toggle between showing and hiding the sidebar when clicking the menu icon
var mySidebar = document.getElementById("mySidebar");

function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
  } else {
    mySidebar.style.display = 'block';
  }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
}

//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}



</script>

</body>
</html>
