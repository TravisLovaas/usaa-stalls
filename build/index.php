<?php
	$host="p:gator4252.hostgator.com";
	$username="travis_usaa_hack";
	$password="12345";
	$database="travis_usaa_hackathon";

function getStatus()
{
	$con = mysqli_connect($host, $username, $password, $database);

	if(mysqli_connect_errno())
	{
		echo "Failed to conenct to MySQL: " . mysqli_connect_error();
	}
	else
	{
		echo "connected";
	}

		$query = "SELECT * FROM stalls";
		$result = mysqli_query($con, $query);
		
		if(mysqli_num_rows($result) > 0)
		{
			while($row = mysqli_fetch_assoc($result))
			{
				$actualResult = "Stall: " . $row["id"] . " " . "Occupied: " . $row["occupied"];
			}
		}

	 mysqli_close($con);

	 return $actualResult;
}

echo <<<_END
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
	<meta name="theme-color" content="#000000">
	<link rel="manifest" href="/~acruz39/manifest.json">
	<link rel="shortcut icon" href="/~acruz39/favicon.ico">
	<title>React App</title>
	<link href="/~acruz39/static/css/main.c17080f1.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
	<button id="button">Refresh</button>

<script>
	$('#button').click(
		function(){
		$('#div1').html(getStatus())
		}
	);

	$('#button').trigger("click");
</script>
	<noscript>You need to enable JavaScript to run this app.</noscript>
	<div id="root"></div>
	<div id="div1">some text</div>
	<script type="text/javascript" src="/~acruz39/static/js/main.04ac371c.js"></script>

</body>
</html>
_END;
?>