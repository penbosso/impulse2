<?php
session_start();
include 'inc/con2.php';
/*This was made by Othman El Mzalni (Youtube Channel : Self Learning)*/
 ?>
<html>
<head>
  <title><?php echo "Chat Room - ".date("Y")  ; ?></title>
       <link rel="stylesheet" href="css/style.css" type="text/css">
        <link rel="stylesheet" href="css/animate.css" type="text/css">
        <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
        <link rel="stylesheet" href="css/bootstrap-theme.css" type="text/css">
        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</head>
<body>
  <center>
<form action="" method="post" id="form">
<img src="logo2.png" title="Chat Room">
<input class="form-control" type="text" name="name" placeholder="User Name" required="required">
<input class="form-control" type="password" name="pwd" placeholder="Password" required="required">
<br/>
<button type="submit" name="login" class="btn btn-info">Login</button>
Or
<button type="submit" name="reg" class="btn btn-success">Sign Up</button>
<br/><br/>
  <button class="btn btn-info"><a href="contact_me.php">Contact Me</a></button>
<br/><br/>
<?php include 'login.php'; ?>
</form>
<div id="#" style="color:white;font-size:30px;">
HOW TO USE THE MESSENGER:<br />
1. Signing Up: <br />
   >>>Clear the default texts and Type in your username and password, then select SIGNUP.<br />
2. Logging In: <br />  
   >>>Clear the default texts and Log in with your existing username and password . Or use<font color="yellow"> Username: guest , Password:guest123</font><br />
3. Sending A message:<br />
   >>>Before you send a message, go to <a href="http://www.africastalking.com">www.africastalking.com</a> in a new tab, signup and open sandbox with tel no.:<font color="yellow">+233 571234567 or +233 241234567 or +233 501234567</font><br />
   >>>Type in your message in the textfield and press <font color="yellow">IMPULSE</font> if you want to send it to offline users as text. Or just press <font color="yellow">SEND</font> if you want to send it online only.<br />
   
</div>
</center>
</body>
</html>
