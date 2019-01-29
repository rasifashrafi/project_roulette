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

?>
<style>
    body{
        text-align: center;
    }
    .store{
        display: flex;
        flex-direction: row;
        justify-content: space-around;
    }
    .store img{
        height: 200px;
        weight: 200px;
    }
    .wallet{
        font-weight:bold;
        font-size: 40px;
        line-height: 2;
    }

</style>

        
<div class="wallet">
    <div>
            <?php echo "Welcome $player"; ?>
    </div>
    <div>
        <?php echo "You have $coins only";?>
    </div>
    <div>
        <img src="" alt="coin" class="coin">
    </div>
    <div>
        <?php echo $email;?>
    </div>
</div><br>

<div class="store">
    <div class="upper">
        <div>
            <img src="" alt=""><br>
            <button>BUY</button>
        </div> <br>
        <div>
            <img src="" alt=""><br>
            <button>BUY</button>
        </div>
    </div>
    <div class="lower">
        <div>
            <img src="" alt=""><br>
            <button>BUY</button>
        </div> <br>
        <div>
            <img src="" alt=""><br>
            <button>BUY</button>
        </div>
    </div>
</div>



<?php include "include/footer.php"; ?>