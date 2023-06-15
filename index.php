<?php
session_start();

include("config.php");
$queryevent = "select Event from events";
$resultevent = mysqli_query($con, $queryevent);
//$rowevent= mysqli_fetch_assoc($resultevent);
// printf ("%s (%s)\n", $rowevent[0], $rowevent[1]);
/*	if ($rowevent[1] == NULL) {
		echo "No Event";
		// break;
	} else
		echo $rowevent[1];

	if ($rowevent[2] == NULL) {
		echo "$rowevent[1]";
	}
	if ($rowevent[3] == NULL) {
		echo "$rowevent[1]";
		echo "$rowevent[2]";

	} else {*/
class myException extends Exception
{
	function get_Message()
	{

		// Error message
		$errorMsg = 'Error on line ' . $this->getLine() .
			' in ' . $this->getFile()
			. $this->getMessage() . ' is number zero';
		return $errorMsg;
	}
}
function demo($a)
{
	while ($rowevent = mysqli_fetch_row($resultevent)) {
		try {

			for ($i = 0; $i < 4; $i++) {
				if ($rowevent[$i] == NULL) {
					echo " ";
				} else {
					echo $rowevent[$i];
					throw new Exception('Number is zero.');
				}
			}
		} catch (myException $e) {

			// Display custom message
			echo "   ";
		}
	}
}









//echo $rowevent[1];
//echo $rowevent[2]; 
// }
//	$user_data = mysqli_fetch_assoc($result);echo"<br>";


if ($_SERVER['REQUEST_METHOD'] == "POST") {
	//something was posted
	$Event = $_POST['Event'];
	$Date = $_POST['Date'];
	$Time = $_POST['Time'];

	if (!empty($Event) && !empty($Time)) {

		//save to database
		//add phone number ip adress
		$query = "insert into events (Event,Date,Time) values ('$Event','$Date','$Time')";

		mysqli_query($con, $query);

		header("Location: ok.html");
		die;
	} else {
		echo "Please enter some valid information!";
	}



}


// logout car casarol admin payment true?
// action make s run php onativation
?>

<!DOCTYPE html>
<html>

<head>
	<title>My website</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>


</style>

<body onLoad="noBack();" onpageshow="if (event.persisted) noBack();" onUnload="">


	<form method="POST">
		<label for="date">Date start</label>
		<script>var today = new Date().toISOString().split('T')[0]; document.getElementsByName("setTodaysDate")[0].setAttribute('min', date_start);</script>
		<input type="date" id="date_start" name="Date">
		<label for="date">Time</label>
		<input type="time" id="date_end" name="Time">
		<input type="text" id="date_end" name="Event">
		<input type="submit">
	</form>


</body>


</html>