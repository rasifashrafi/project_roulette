<?php
session_start();

include("conn/connection.php");
if(count($_SESSION)) header("Location: game.php");
$error = isset($_GET['error']); 



include "include/header2.php"; 

    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $pwd = $_POST['password'];
        $query = "SELECT * FROM players WHERE email = '$email' && password = '$pwd' ";
        $data = mysqli_query($conn, $query);
        $result = mysqli_num_rows($data);

        if ($result == 1){
            $_SESSION['email'] = $email;
            header('location:game.php');
        } else {
            echo "<div><h6><b class='error'>Login Failed. Please enter a valid Username or Password.</b></h6></div>";
        }
    };
?>
<style>
body{
  background-image: url("https://i.pinimg.com/originals/05/c4/58/05c45868b6341f57c7d6a3b9708f42b6.jpg");
  background-repeat: no-repeat;
}

.container{
  text-align: center;
  color:white;
  line-height: 3;
}
</style>
<div class="col-sm-8 text-left"> 
  <div class="container">
  <h2>Log In</h2>
  <form action="" method="post">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="remember"> Remember me</label>
    </div>
    <input type="submit" name="submit" class="btn btn-default">
  </form>
</div>
</div>
<?php include "include/footer.php"; ?>