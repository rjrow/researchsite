<?php

	echo "hello";
	
	$DB_USER = "eocmaster";
	$DB_PASS = "eocseidman";
	$DB_NAME = "eocdb";
	$DB_HOST = "eoc.cgzanv6lfrne.us-west-2.rds.amazonaws.com";
	$server = mysql_connect($DB_HOST,$DB_USER,$DB_PASS);
	$connection = mysql_select_db($DB_NAME, $server);



	$initQuery = "SELECT * FROM state_rankings";
	$query = mysql_query($initQuery);

	if(!$query) 
	{
		echo mysql_error();
		die;
	}



	while($row = mysql_fetch_assoc($query))
	{
		echo $row['rank'];
		echo '<br></br>';
		echo $row['job_growth'];
	}

	$data = array();
	for($x = 0; $x < mysql_num_rows($query); $x++)
	{
		$data[] = mysql_fetch_assoc($query);s
	}


	header("Content-Type: application/json");
	echo json_encode($query->fetchAll(PDO::FETCH_ASSOC)); 

	// mysql_close($server);

?>