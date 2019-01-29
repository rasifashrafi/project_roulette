<?php
if(isset($_POST['submit'])) {
$to = "you@you.com";
$subject = "Form Tutorial";
$name_field = $_POST['name'];
$email_field = $_POST['email'];
$message = $_POST['message'];
 
$body = "From: $name_field\n E-Mail: $email_field\n Message:\n $message";
 
echo "Data has been submitted to $to!";
mail($to, $subject, $body);
} else {
echo "blarg!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="POST" action="">
   <input type="text" name="name" size="19"><br>
   <br>
   <input type="text" name="email" size="19"><br>
   <br>
   <textarea rows="9" name="message" cols="30"></textarea>
   <br>
   <br>
   <input type="submit" value="Submit" name="submit">
</form>
</body>
</html>