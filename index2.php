<?php
session_start();
include("config.php");
// for display of omly one element 
/*
$Event = "select Event from events";
$Date= "select Date from events";
$Time= "select Time from events";

$result1= mysqli_query($con, $Event);
$result2= mysqli_query($con, $Date);
$result3= mysqli_query($con, $Time);

$Event1 = mysqli_fetch_assoc($result1);
$Event2 = mysqli_fetch_assoc($result2);
$Event3 = mysqli_fetch_assoc($result3);
echo "event_name -- ", $Event1['Event'];
echo"<br>";
echo"event_date -- ", $Event2['Date']; 
echo"<br>";
echo "event_time -- ",$Event3['Time']; 
*/

$result = mysqli_query($con, "SELECT * FROM events");
// echo "Eventname     Date       Time <br>";
while ($collections = mysqli_fetch_array($result)) {
	$summary1 = $collections['Event'];
	$summary2 = $collections['Date'];
	$summary3 = $collections['Time'];
	// echo $summary1. $summary2."\t".$summary3."<br>";

}


// posting
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	//something was posted
	$Event = $_POST['Event'];
	$Date = $_POST['Date'];
	$Time = $_POST['Time'];

	if (!empty($Event) && !empty($Time)) {

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
	<meta name="viewport" content="width=device-width, initial-scale
	<title>My website</title>
	<meta name=" viewport" content="width=device-width, initial-scale=1.0">
</head>

<style>
	table {
		width: 500px;
		margin: 0 auto;
		border: #000 1px solid;
		border-radius: 10px;


	}

	.headtable {
		background-color: rgba(179, 54, 9, 0.39);
		backdrop-filter: blur(4px);
		height: 8vw;
		border: #000 1px solid;
		border-radius: 10px;
		text-align: center;

	}

	.tdstyle {
		text-align: center;
		font-weight: 500;
	}

	.tdstyle:hover {
		background-color: whitesmoke;
		transition: 0.5s
	}

	.formstyle {
		width: 500px;
		margin: 0 auto;
	}

	.btn {
		height: 40px;
		background-image: linear-gradient(to right, #EB3349 0%, #F45C43 51%, #EB3349 100%);
		text-align: center;
		text-transform: uppercase;
		transition: 0.5s;
		background-size: 200% auto;
		color: white;
		border-radius: 10px;
		display: block;
		color: white;
		padding: 10px 20px;
		border-radius: 35px;
		border: none;
		margin-top: 10px;
		width: 500px;
		margin: 0 auto;
		cursor: pointer;
	}

	.btn:hover {
		background-position: right center;
		/* change the direction of the change here */
		color: #fff;
		text-decoration: none;
	}
</style>

<body onLoad="noBack();" onpageshow="if (event.persisted) noBack();" onUnload="">
	<table class="tablestyle">
		<tr class="headtable">
			<td>Event</td>
			<td>Date</td>
			<td>Time</td>
		</tr>
			<?php
			$result = mysqli_query($con, "SELECT * FROM events");
			while ($collections = mysqli_fetch_array($result))
			 {
				echo "<td> $summary1 </td>";
			} ?>
		</td>
		<td class="tdstyle">
			<?php echo $summary2; ?>
		</td>
		<td class="tdstyle">
			<?php echo $summary3; ?>
		</td>
	</table> <br>
	<form method="POST" class="formstyle">
		<label for="date">Date start</label>
		<script>var today = new Date().toISOString().split('T')[0]; document.getElementsByName("setTodaysDate")[0].setAttribute('min', date_start);</script>
		<input type="date" id="date_start" name="Date">
		<label for="date">Time</label>
		<input type="time" id="date_end" name="Time">
		<input type="text" id="date_end" name="Event"><br>
		<input type="submit" class="btn">
	</form>


</body>


</html>