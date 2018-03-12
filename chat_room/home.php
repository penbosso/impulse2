<?php
session_start();
setcookie("chat_room","Messages",time() +3600 * 10,"/",TRUE,TRUE);
include 'inc/con2.php';
include 'inc/fun.php';
if (!isset($_SESSION['user_name'])) {
  header("location:index.php");
}else{
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Welcome !</title>
  <link rel="stylesheet" href="css/home_style.css" type="text/css">
  <link rel="stylesheet" href="css/button.css" type="text/css">
   <link rel="stylesheet" href="css/animate.css" type="text/css">
   <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
   <link rel="stylesheet" href="css/bootstrap-theme.css" type="text/css">
   <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
   <!-- Latest compiled and minified CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
  <?php
  $user = $_SESSION['user_name'];
       $get_user = "SELECT * FROM users WHERE user_name='$user'";
       $run_user = mysqli_query($con,$get_user);
       $row = mysqli_fetch_array($run_user);

       $user_id = $row['user_id'];
       $user_name = $row['user_name'];
       //echo "
       //<h3 align='center'>Welcome $user_name</h3>";
   ?>
   
  <div>
    <div id="msg">

		<form action="" method="post" id="form">
		<div id="#" style="color:black;width:110%;height:inherit;position:;background:#eceff1;padding:15px 5px 5px 15px;">
		
		<b>COURSE: CSCD 102 </b>
		<button class="btn btn-warning" ><a href="#">Math 102</a></button>
		<button class="btn btn-warning" ><a href="#">Stat 111</a></button>
		<button class="btn btn-warning" style="float:right;"><a href="logout.php">Logout</a></button>	
		
		
		</div>
		
		<div id="txt">
		
			<?php get_post(); ?>

		</div>
		
		<textarea style="width:1001px;" name="msg" class="form-control" placeholder="Write Your Message Here!" required="required"></textarea>
		<button type="submit" name="send" class="btn btn-info">Send</button>
		<button type="submit" name="send" class="btn btn-info">Impulse</button>
		<!--<button class="btn btn-warning"><a href="logout.php">Logout</a></button>-->
		<center>
		
		
		<?php insert_msg(); ?>
		</center>
		</form>



		<div id="user">
		
				<h4 align="center"><b>Members</b></h4>
				<hr>
				<?php get_user(); ?>

		</div>



    </div>
</div>

<div id="footer">
        
<footer> 
<br /><br /><br />		
Impulse Team - forLoopAfrica | UG - Legon <?php echo date("Y"); ?></footer>
</div>
<script>
$(document).ready(function(){
    $("button").click(function(){
        $("div").scrollTop(100);
    });
});
</script>
</body>
</html>
<?php  }
?>
