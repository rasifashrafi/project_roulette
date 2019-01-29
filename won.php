<?php
session_start();
include("conn/connection.php");

// $title= 'Fun Roulette Game';
$email = $_SESSION['email'];

if($email == TRUE) {
} else {
    header('location:login.php');
}

$query = "SELECT * FROM players WHERE email='$email'";                                                                                                                                     
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);

if($total !=0){
    while($result = mysqli_fetch_assoc($data)){
        $player = $result['username'];
        $coins = $result['chips'];
        }
    } else {
        echo "No record found";
} 

$query = "SELECT * FROM bet";                                                                                                                                     
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);
    
if($total != 5){        
    header("location:game.php");
}

$query = "SELECT * FROM result WHERE name='$player'";                                                                                                                                       
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data); 

if($total !=0){
    while($result = mysqli_fetch_assoc($data)){
        $ba = $result['bet_amount'];
        $bn = $result['bet_number'];
        $bc = $result['bet_color'];
        $wn = $result['win_num'];
        $wc = $result['win_col'];
        $wchips = $result['win_chips'];
        }
    } else {
        echo "No record found";
} 

include "include/header3.php"; 

?>

<style>
    body{
        text-align: center;
        background-image: url("https://www.pokerchips.com/media/catalog/product/cache/1/image/1000x1000/9df78eab33525d08d6e5fb8d27136e95/s/u/suits-black-poker-chips.jpg");
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        color: red;
    }
</style>

<div class="col-sm-8 text-left"> 
    <div class="welcome">
        <h1>Thank You For Playing....<br>Keep Playing.... <br> More prize is Waiting For You... <br></h1>
        <h1><?php echo $player; ?> </h1><br>
    </div>
    <div>
    <h1><?php echo "CHIPS = ". $coins; ?></h1>
    </div>
</div>


    <div class="store-mail welcome">
        <?php echo $email; ?>
    </div>

<div style="text-align:center;">
    <div>
        <div class="result-view">
            <h3><a href="summary.php">View Result</a></h3>
        </div>
        <!-- <img src="img/results.png" alt="Result Logo" style="width: 525px; text-align:center; margin-top: -88px;"> -->
    </div>

    <div class="result-right">
        <h3>You have bet
            <?php echo $ba; ?> chips.
        </h3>
        <h3 id='sub'>Your Number :
            <?php echo $bn; ?>
        </h3>
        <h3 id='sub'>Your Color :
            <?php echo $bc; ?>
        </h3>
    </div>
</div>
<div class='result-container'>
    <div class='result-left'>
        <h2>Winning Number :
            <?php echo $wn; ?>
        </h2>
        <h2>Winning Color :
            <?php echo $wc; ?>
        </h2>
    </div>
</div>
<div class='congrate'>
    <?php
    if ($wchips > 0) {
        echo "<h2>Congratulations!!! You have won " . $wchips . " chips.</h2>";
    } else {
        echo "<h2>Better luck next time.</h2>";
    }?>
</div>

<script>

    history.pushState(null, null, document.URL);
    window.addEventListener('popstate', function () {
        history.pushState(null, null, document.URL);
    });

    document.onkeydown = function (e) {
        var key;
        if (window.event) {
            key = event.keyCode
        }
        else {
            var unicode = e.keyCode ? e.keyCode : e.charCode
            key = unicode
        }

        switch (key) {//event.keyCode
            case 116: //F5 button
                key.returnValue = false;
                key = 0; //event.keyCode = 0;
                return false;
            case 82: //R button
                if (event.ctrlKey) {
                    key.returnValue = false;
                    key = 0; //event.keyCode = 0;
                    return false;
                }
            case 91: // ctrl + R Button
                event.returnValue = false;
                key = 0;
                return false;
        }
    }
</script>
</div>
<?php include "include/footer.php"; ?>