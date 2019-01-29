<?php
include("conn/connection.php");
?>
<style>
body{
    background-image: url("https://matkabookie.com/images/slidebanner4.jpg");
    background-repeat: no-repeat;
    text-align: center;
    color: white;
}
h1 {
    left: 0;
    line-height: 200px;
    margin: auto;
    margin-top: -100px;
    position: absolute;
    top: 50%;
    width: 100%;
}
</style>
<?php
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $name = ucwords($_POST['username']);
    $pass = $_POST['password'];


    $email_query = "SELECT * FROM players WHERE email='$email'";
    $user_query = "SELECT * FROM players WHERE username='$name'";
    $conUser = mysqli_query($conn, $user_query);
    $conEmail = mysqli_query($conn, $email_query);

     //check if user already exist
    if (mysqli_num_rows($conUser) > 0) {
        echo "<h1>Sorry. Username already taken.</h1>";     
    } else if (mysqli_num_rows($conEmail) > 0) {
        echo "<h1>Sorry.This email already exists.</h1>";

    //email validation    
    } else if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            echo "<h1>Please Enter A Valid Email.</h1> ";
    } else {
        if($email!="" && $name!="" &&  $pass!="" ) {
            $query = "INSERT INTO players VALUES ('','$email', '$name', '$pass', '100.00')";
                
            $data = mysqli_query($conn, $query);
            if($data) {
                echo "<h1>WOW!! You win 100 chips. Have a good luck...</h1>";
          //header('location:login.php');
            } else {
                echo "<h1>*All fields are required!</h1>";
            }
        }
    }
}   
?>
<?php
include("include/footer.php");
?>
