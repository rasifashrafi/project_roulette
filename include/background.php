<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="w3-content w3-section" style="max-width: 100vw; margin-left: 13vw;">


<img class="mySlides" src="https://www.casinotop10.net/assets/Uploads/AmericanRoulette.jpg" style="width:100%; height:80vh">
<img class="mySlides" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRu_I9GsH0yRfyMvWveVYVISNsDjK_rhcVogQL5ByvuXBiUj_qN" style="width:100%;  height:80vh;">
<img class="mySlides" src="https://helpmewithdraw.com/wp-content/uploads/2018/04/roulette-wheel-light.jpg" style="width:100%; height:80vh;">
<img class="mySlides" src="https://www.livecasinos.com/wp-content/uploads/Playtech-Live-French-Roulette-1.jpg" style="width:100%; height:80vh;">
</div>

<script>
var myIndex = 0;
carousel();

function carousel() {
var i;
var x = document.getElementsByClassName("mySlides");
for (i = 0; i < x.length; i++) {
  x[i].style.display = "none";  
}
myIndex++;
if (myIndex > x.length) {myIndex = 1}    
x[myIndex-1].style.display = "block";  
setTimeout(carousel, 9000);    
}
</script> 
</body>
</html>