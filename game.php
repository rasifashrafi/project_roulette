<?php
session_start();
include("conn/connection.php");
include("include/header3.php");

?>
<div class="col-sm-8 text-left"> 
<?php
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
    
if($total == 5){        
    header("location:win.php");
}

$query = "TRUNCATE TABLE result;";
if (mysqli_query($conn, $query)) {
    
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}


?>

<style>
    body{
        text-align: center;
        line-height: 50px;
        background-image: url("https://www.icelondon.uk.com/__media/libraries/products/2C3DC930-5056-B762-904D07F4578ECE25-supporting_image_1.jpg");
    }
    .container{
    left: 0;
    margin: auto;
    position: absolute;
    width: 100%;
    background: linear-gradient(142deg, rgba(141,52,52,1) 0%, rgba(244,239,237,1) 50%, rgba(0,0,0,1) 100%);
    }
    .table{
        border-spacing: 30PX;
    }
    .welcome{
        background: linear-gradient(142deg, rgba(174,11,11,1) 0%, rgba(43,49,218,1) 50%, rgba(124,14,167,1) 100%);
    }
    form{
        background: linear-gradient(142deg, rgba(255,0,0,1) 0%, rgba(113,42,11,1) 50%, rgba(146,16,135,1) 100%);
    }
    .chip{
        background: linear-gradient(142deg, rgba(99,0,0,1) 0%, rgba(255,5,5,1) 50%, rgba(0,0,0,1) 100%);
        color: white;
    }
</style>

<div class= "chip">
<h1>Chips = <?php echo $coins ?></h1>
</div>
<div class="welcome">
    <h1>Wellcome</h1>
    <?php echo "<h1>$player</h1>"; ?>
</div>

<div class="game-mail welcome">
    <?php echo $email; ?>
</div>
<br>
<?php
if(isset($_POST['submit'])){
    $amount = $_POST['amount'];
    $color = ucwords($_POST['color']);
    $number = $_POST['number'];
        
    $player_sql = "SELECT * FROM bet WHERE player_name='$player'";
    $con_user = mysqli_query($conn, $player_sql);

    //check if player already bet
    if (mysqli_num_rows($con_user) > 0) {
        echo "Sorry. You have already placed a bet.";     
    } else {     
        if ($amount <= $coins) {
            $query = "UPDATE players SET chips = $coins - $amount WHERE username='$player'"; 
            $data = mysqli_query($conn, $query); 

            $query = "INSERT INTO bet VALUES ('', '$player', '$amount', '$color', '$number')";
            $data = mysqli_query($conn, $query);
            if($data) {
                header("Refresh:0; url=game.php");
                echo "Records added successfully.";
            } else {
                echo "*All fields are required!";
            }
        } else {
            echo "Sorry. You don't have enough chips to bet. Buy chips from our <a href='store.php'>Online Store</a>.";  
        }         
    }
}
?>
<form action="" method="post">
    <div class="form-group">
        <label for="amount">Amount:</label>
        <input type="number" name="amount" class="form-control" id="usr" min="1" required>
    </div>
    <div class="form-group">
        <label for="color">Color:</label>
        <select class="form-control" name="color" id="sel1" required>
            <option selected disabled value="">Select your color</option>
            <option value="red">Red</option>
            <option value="black">Black</option>
            <option value="green">Green</option>
        </select>
    </div>
    <div class="form-group">
        <label for="number">Number:</label>
        <select class="form-control" name="number" id="sel1" required>
            <option selected disabled value="">Select your number</option>
            <?php 
                            for($i = 0; $i <= 35; $i++) {
                                echo "<option value='$i'>$i</option>";
                            }
                            ?>
        </select>
    </div>

    <input type="submit" name="submit" class="btn btn-default">
</form>


<br>
    <div class="container">
  <h1>Bet table </h1>                     
  <table class="table" align="center">
    
      <tr>
        <th>ID</th>
        <th>Player</th>
        <th>Bet</th>
        <th>Color</th>
        <th>Number</th>
      </tr>
    
    
    <?php 
if($total != 0){
    while($result = mysqli_fetch_assoc($data)){
        echo   " 
            <tr>
                <td>" . $result['id'] . "</td>
                <td>" . $result['player_name'] . "</td>
                <td>" . $result['amount'] . "</td>
                <td>" . $result['color'] . "</td>
                <td>" . $result['number'] . "</td>
            </tr>";
    }
} 
?>
    
  </table>
<div>

    <h3 style="text-align:center;">* Required 5 players to play.</h3>
</div>

</div>


<?php include "include/footer.php"; ?>