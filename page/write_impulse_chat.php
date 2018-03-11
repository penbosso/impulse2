
<?php 
require_once("../include/initialize.php"); 

require_once(LIB_PATH.DS.'database.php');

require_once(LIB_PATH.DS.'AfricasTalkingGateway.php');


$text= substr($_GET["text"], 0, 254);


$user_id = $session->user_id;

$sql = "SELECT username FROM user WHERE id = $user_id";
$result = $database->query($sql);

$result   = $database->fetch_array($result);

$username = $result['username'];

$mes   = "";

//escaping is extremely important to avoid injections!
// $nameEscaped = htmlentities(mysqli_real_escape_string($db,$username)); //escape username and limit it to 32 chars
$textEscaped =$database->escape_value($text); //escape text and limit it to 128 chars

//create query
$sql="INSERT INTO message (username, text) VALUES ('$username', '$textEscaped')";
//execute query
if ($database->query($sql)) {
	//If the query was successful
	$mes .= "Message sent ";
}else{
	//If the query was NOT successful
	$mes .= "An error occurred ";
}

// And of course we want our recipients to know what we really do
$message    = $textEscaped;		
$recipients = '"';

$sql = "SELECT phone, status FROM user ";

$result = $database->query($sql);

while ($row = $database->fetch_array($result)) {
	
	$phone = $row['phone'];
	$status = $row['status'];
		if ($status == 'offline') {
		$recipients .= $phone .' ,';
		} 
		
}
	$recipients = $recipients . '+23324000000000"';//loop back

	//implementing affican is talking API
	
	$username   = "sandbox";
	$apikey     = "5482f5019a3b0895f1baa33696f1334cec085040ad8842435be0d3345697b2fc";


	// Create a new instance of our awesome gateway class
	$gateway    = new AfricasTalkingGateway($username, $apikey, "sandbox");

	try 
		{ 
		// Thats it, hit send and we'll take care of the rest. 
		$results = $gateway->sendMessage($recipients, $message);
		
		$mes .= "<br />";
		foreach($results as $result) {
			// status is either "Success" or "error message"
			$mes .= " Number: " .$result->number;
			$mes .= " Status: " .$result->status;
		//  $mes .= " MessageId: " .$result->messageId;
			$mes .= " Cost: "   .$result->cost."<br />";
		}
		}
		catch ( AfricasTalkingGatewayException $e )
		{
		$mes .= "Encountered an error while sending: ".$e->getMessage();
		}

		$session->message($mes);

		echo $_SESSION['message'];
//  $session->message();
	
		 

?>


