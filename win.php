<?php
session_start();

include("conn/connection.php");
header("Refresh:0; url=won.php");
//$title = 'Fun Roulette Game';
$email = $_SESSION['email'];

if($email == TRUE) {
} else {
    header('location:login.php');
}

$query = "SELECT * FROM players WHERE email = '$email'";                                                                                                                                     
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);

if($total != 0){
    while($result = mysqli_fetch_assoc($data)){
        $player = $result['username'];
        $coins = $result['chips'];
        }
    } else {
        echo "No record found";
} 

    $win_number = rand(0, 35);
    $arr = array("Red"=>"red","Green"=>"green","Black"=>"black");
    $win_color = (array_rand($arr,1));
    
    $query = $conn->query("SELECT players.username, players.chips, bet.amount, bet.number, bet.color FROM players join bet on players.username = bet.player_name ");
    $datas = [];
    while ($row = $query->fetch_object()) {
       $datas[] = $row;    
    }
    foreach ($datas as $data){    
       $chip = $data->chips;
       $amount = $data->amount;
       $number = $data->number;
       $color = $data->color;
       $uname = $data->username;
    
       if ($win_number == $number && $win_color == $color){
           $win_amount = $amount*20;
           $message = "Congratulation!!! You have won $win_amount chips.";
       }
       else if ($win_number == $number){
           $win_amount = $amount*10;
           $message = "Congratulation!!! You have won $win_amount chips.";
       }
       else if ($win_color == $color){
           $win_amount = $amount*1.5;
           $message = "Congratulation!!! You have won $win_amount chips.";
       }
       else {
           $win_amount = $amount*0;
           $message = "Better luck next time.";
       }
    
       //update chip into players table
       $query = $conn->query("UPDATE players SET chips = ($chip + $win_amount) WHERE username='$uname'");    
    
       date_default_timezone_set('America/New_York');
       $date = date("Y/m/d h:i:sa");
    
       //insert data into result table
       if($win_amount){
           $query = $conn->query("INSERT INTO result VALUES ('', '$win_number', '$win_color', '$uname', 'Winner', '$amount','$color', '$number','$win_amount', '$date')");
       }else{
           $query = $conn->query("INSERT INTO result VALUES ('', '$win_number', '$win_color', '$uname', 'Loser', '$amount', '$color', '$number','$win_amount', '$date')");
       }
    }
  ?>