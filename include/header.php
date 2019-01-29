<!DOCTYPE html>
<html lang="en">
<head>
  <title>Roulette Game</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <style>
   body {
  margin-top: 0vh;
  margin-left: 0vh;
  padding:0;
  font-family: "Lato", sans-serif;
}

.sidebar {
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: black;
  position: fixed;
  height: 100%;
  overflow: auto;
}

.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
  color: white;
}


.sidebar a:hover:not(.active) {
  background-color: #555;
  color: white;
}

div.content {
  margin-left: 200px;
  padding: 1px 16px;
  height: 1000px;
}

@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}

.topnav {
  overflow: hidden;
  background-color: #333;
  width: 85.5vw;
  margin-left: 26vh;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}


  </style>
</head>
<body>

<div class="sidebar">
  <a href="#">About US</a>
  <a href="index.php">Home</a>
  <a href="game.php">Games</a>
  <a href="contact.php">Contact Us</a>
  
</div>

<div class="topnav">
  <a href="./login.php">LOGIN</a>
  <a href="./registration.php">SIGN UP</a>

</div>
<?php
  include("background.php");
?>

</body>
</html>