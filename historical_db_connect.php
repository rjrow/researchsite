<?php

	$DB_USER = DB_USER_jg;

	$DB_PASS = DB_PASS_jg;

	$DB_NAME = DB_NAME_jg;

	$DB_HOST = DB_HOST_jg;



	$con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

	$query = "SELECT state_name FROM state_rankings_t;";

	$result = mysqli_query($query);

	while($row = mysqli_fetch_array($result))
	{
		echo $row;
	}

?>