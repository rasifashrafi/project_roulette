<?php
session_start();
include("conn/connection.php");
include "include/header3.php";
?>

<div class="col-sm-8 text-left">
    <?php     
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



$query = "SELECT * FROM result where name='$player'";                                                                                                                                       
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data); 

if($total != 0){
    while($result = mysqli_fetch_assoc($data)){
        $wn = $result['win_num'];
        $wcol = $result['win_col'];
    }
    } else {
    // echo "No record found";
    }

$query = "SELECT * FROM result";                                                                                                                                       
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data); 

if($total != 5){        
    header("location:game.php");
}

?>

<style>
    body{
        text-align: center;
        background-image: url("http://www.preservationonline.org/wp-content/uploads/2018/08/210569.jpg");
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        color: rgb(123,104,238);
    }
    table{
        border-spacing: 100px .5rem;
        background-color: black;
    }

</style>

<div style="background-color:black;">
    <div>
        <h1>
        <?php echo $player; ?>
        </h1>
    </div>
    <div>
        <h1>
        <?php echo " CHIPS = $coins";  ?></h1>
    </div>
    <div>
        <?php echo $email; ?>
    </div>
    <div>
        <h2>Game Result</h2>
    </div>
    <div>
        <div>
            <h2>Winning Number :
                <?php echo $wn; ?>
            </h2>
            <h2>Winning Color :
                <?php echo $wcol; ?>
            </h2>
        </div>
    </div>
</div>

 
    <div>
        <h1>Summary</h1>
        <table align="center">
            <tr>
                <th>ID</th>
                <th>Player</th>
                <th>Bet Amount</th>
                <th>Bet Color</th>
                <th>Bet Number</th>
                <th>Status</th>
                <th>Chips Win</th>
            </tr>
            <?php 
if($total != 0){
    while($result = mysqli_fetch_assoc($data)){
        echo   "
        <tr>
            <td>" . $result['id'] . "</td>
            <td>" . $result['name'] . "</td>
            <td>" . $result['bet_amount'] . "</td>
            <td>" . $result['bet_color'] . "</td>
            <td>" . $result['bet_number'] . "</td>
            <td>" . $result['status'] . "</td>
            <td>" . $wc = $result['win_chips'] . "</td>
        </tr>";
}
} else {
// echo "No record found";
}
?>
        </table>
    </div>



    <?php            
        $query = "INSERT INTO scoreboard (win_num, win_col, name, status, bet_amount, bet_color, bet_number, win_chips, date) 
        SELECT win_num, win_col, name, status, bet_amount, bet_color, bet_number, win_chips, date 
        FROM result";
        if (mysqli_query($conn, $query)) {

        } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
        
    $query = "TRUNCATE TABLE bet;";
    if (mysqli_query($conn, $query)) {
        
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
?>
</div>

<?php include "include/footer.php"; ?>