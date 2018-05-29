<?php

function getStatus()
{
	$host="p:gator4252.hostgator.com";
	$username="travis_usaa_hack";
	$password="12345";
	$database="travis_usaa_hackathon";
	
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

 $result = getStatus();

?>
<html>
<body>

    <?php if (isset($result)) { ?>
        <h1> Result: <?php echo $result ?></h1>
    <?php } ?>
    <form action="" method="post">
    <p><input type="submit" value="Refresh" /></p>

</body>
</html>