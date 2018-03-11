<?php
require_once("../include/initialize.php");

if ($session->is_logged_in()) {
    redirect_to("index.php");
}

if (isset($_POST['login'])){//FORM SUBMITTED
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);

	//check database to see if username/password exist.
	$found_user = User::authenticate($username,$password);

	if($found_user){
        $session->login($found_user);
        $sql = "UPDATE user SET status ='online' WHERE id = '$found_user->id'";
        $database->query($sql);
		log_action('Login',"{$found_user->username} logged in");
		redirect_to("index.php");
	}else{
		//username/password not found in db
        $message = "Username/password combination incorrect.";
        redirect_to("login.php");
	}
}else{//form not submitted.
	$username = "";  
	$password = "";
	$message ="";
}

if(isset($_POST['signup'])){
    $user = new User();
    $user =$user->instantiate($_POST);
    if ($user->save()) {
        $session->message("Welcome! you have successfully signed up");
        redirect_to("index.php");
        echo $_SESSION['message'];
    } else {
        $session->message("<br />"." unable to sign you up");
        redirect_to("");
    }

}

?>
<html>
    <head>
        <title>Impluse</title>
        <link rel="stylesheet" type="text/css" href="../css/login.css" />
    </head>
    <body>
        <div class="top">
            <h1 id="logo_txt">IMPULSE</h1>
            <div class="login">
                <form action="login.php" method="post">
                    <input type="text" name="username" value="" placeholder="Username" required class="signinput" />
                    <input type="password" name="password" value="" placeholder="Password" class="signinput" required />
                    <input type="submit" name="login" value="Login" id="btnsignin" />
                    <button type="button" id="newuser" onclick="document.getElementById('signup').style.display='block'">New User</button>
                </form>
            </div>
        </div>
        <div class="contain">
            <div class="content">
                <?php echo output_message($session->message); ?>
            </div>
            <div id="know">
                <h2><em>Do You Know?</em><br> The Benefits Of Effective And Immediate Communication<b>!!</b> </h2>
                <p>
                    <ol>
                        <li>Effective communication causes productivity to increase.</il>
                        <li>Good and immediate communication eliminates barriers.</il>
                        <li>Effective communication buids teams.</il>
                    </ol>
                    Login to find out more....
                </p>
                <h1>READ ME!</h1>
                <p># IMPULSE
Hello dearies and sugarplums,
	Have you ever gotten frustrated to the point of wanting to tear your hair out simply because 
	you could not receive an important message on time? Quite annoying right? That is why team Impulse
	decided to come together to create this awesome app - IMPULSE. This app will decide which message is
	important enough for you to receive even when offline in the form of an SMS. The most important feature, 
	which makes our app unique, is the impulse check box. The impulse check box indicates how important the 
	message is.

###EXAMPLE
for trial
login as 
userame = chris 
password= Chris12

lunch sandbox simulator with jenny : +233243344331 who is online and sedem : +23324334433 offline

if impluse is checked the message will be send to all users in the group and sms will be sent to users offline instantly

if impluse is not checked the message will be send to users in the group but only users online will see the message instantly </p>

            </div>
            
            <div class="signup" id="signup">
                <span onclick="document.getElementById('signup').style.display='none'" class="close" title="Close Modal"><h1>&times;</h1></span>
                    <form action="login.php" method="post" name="signup_form">
                        <table>
                            <tr><p id ="para">Create a new account </p></tr>
                            <tr>
                                <td>Email:</td><td><input type="text" name="email" id="email" class="signupinput" required/></td>
                            </tr>
                            <tr>
                                <td>First name:</td><td><input type='text' name='first_name' id='fname' class="signupinput" required/></td>
                            </tr>
                            <tr>
                                <td>Last name:</td><td><input type='text' name='last_name' id='lname' class="signupinput" required/></td>
                            </tr>
                            <tr>
                                <td>Username:</td><td><input type='text' name='username' id='username' class="signupinput" required/></td>
                            </tr>
							<tr>
                                <td>Phone number:</td><td><input type='text' name='username' id='phone' class="signupinput" placeholder ="eg. +233123456789" maxlength="13" required/></td>
                            </tr>
                            <tr>
                                <td>Password:</td><td><input type="password" name="password" id="password" class="signupinput" required/></td>
                            </tr>
                            <tr>
                                <td>Confirm password:</td><td> <input type="password" name="confirmpwd" id="confirmpwd" class="signupinput" required/></td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="submit" name="signup" value="Sign up" id="btnsignup" 
                                onclick="return validateForm(this.form,
                               this.form.username,
                               this.form.email,
                               this.form.password,
                               this.form.confirmpwd,
                               this.form.first_name,
                               this.form.last_name,
							   this.form.phone);" /></td><td></td>
                            </tr>
                        </table>                        
                    </form>
                </div>
        </div>

        </div>
    <script  src="../js/valid.js"></script>
    </body>
</html>