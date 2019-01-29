<?php
session_start();
include("conn/connection.php");

$title= 'Fun Roulette Game';
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

$query = "SELECT * FROM scoreboard ORDER BY date DESC LIMIT 100";
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);

include "include/header.php"; 
?>
<div class="col-sm-8 text-left">
    <div class="head" id="main">

        <div class="wallet">
            <div>
                <strong>
                    <?php echo $coins;  ?> chips </strong>
            </div>
            <div><img src="img/coin.png" alt="coin" class="coin"></div>
        </div>

    </div>
    <div class="welcome">Welcome <b>
            <?php echo $player; ?></b> | <a href="logout.php">Logout</a>
    </div>


    <!-- <div id="mySidebar" class="sidebar">
    <img src="img/7.png" alt="Roulette Logo" class="logo">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <button class="side-btn"><a href="game.php">Play</a></button>
    <button class="side-btn"><a href="help.php">Help</a></button>
    <button class="side-btn"><a href="store.php">Online Store</a></button>
    <button class="side-btn"><a href="terms.php">Terms & Conditions</a></button>
    </div> -->
    <div class="mail welcome">
        <?php echo $email; ?>
    </div>


    <div style="    width: 590px;" class="container">
        <h1 class="center">Scoreboard</h1>
        <table class="table table-striped">
            <tr>
                <th>Player</th>
                <th>Bet Amount</th>
                <th>Bet Color</th>
                <th>Bet Number</th>
                <th>Winning Number</th>
                <th>Winning Color</th>
                <th>Chips Win</th>
                <th>Time</th>
            </tr>
            <?php                                                                                                                                   
if($total !=0){
    while($result = mysqli_fetch_assoc($data)){
        echo   " 
            <tr>
                <td>" . $result['name']  . "</td>
                <td>" . $result['bet_amount'] . "</td>
                <td>" . $result['bet_color'] . "</td>
                <td>" . $result['bet_number'] . "</td>
                <td>" . $result['win_num'] . "</td>
                <td>" . $result['win_col'] . "</td>
                <td>" . $result['win_chips'] . "</td>
                <td>" . $result['date'] . "</td>
            </tr>";
    }
} else {
    // echo "No record found";
}
?>
        </table>
    </div>
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

<?php include "include/footer.php"; ?>