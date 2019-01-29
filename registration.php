<?php
session_start();
include("conn/connection.php");
//error_reporting(0);

include "include/header2.php";

?>

<style>
body{
  background-image: url("https://www.insidecatholic.com/wp-content/uploads/2018/01/maxresdefault-28.jpg");
}
.container{
  text-align:center;
  line-height: 3;
  color: white;
}

</style>
<div class="container">
  <h2>Resistration</h2>
  <form action="registration_validation.php" method="post">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="Username">Username:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter username" name="username">
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
<?php
include "include/footer.php";
?>
