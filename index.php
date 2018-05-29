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

	$query = "SELECT * FROM stalls";
	$result = mysqli_query($con, $query);
	
	if(mysqli_num_rows($result) > 0)
	{
		while($row = mysqli_fetch_assoc($result))
		{
			if($row["occupied"] == 0){
				$status = "Vacant";
			}else{
				$status = "Occupied";
			}
			$actualResult = "Stall: " . $row["id"] . " " . "Status: " . $status;
		}
	}

	 mysqli_close($con);

	 return $actualResult;
}

 $result = getStatus();

?>
<html>
	<head>
		<link rel="stylesheet" href="./styles.css">
	</head>
	<body>

	    <div>
	    	<h1>Floor 7</h1>
	    	<div class="stall"></div>
	    	<div class="stall"></div>
	    	<div id="men1" class="stall">
	    		<?php 
			    	if (isset($result)) {
			    ?>
	        	<h2><?php echo $result ?></h2>
			    <?php
			    	}
			    ?>
	    	</div>
	    	<div class="stall"></div>
	    </div>

	    <form action="" method="post">
	    <p><input type="submit" value="Refresh" /></p>

	</body>
</html>