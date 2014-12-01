<?php

$q = (int)$_GET['Month'];

$con = mysqli_connect(DB_HOST_jg,DB_USER_jg,DB_PASS_jg,DB_NAME_jg);
if (!$con) {
	die('Could not connect: ' . mysqli_error($con));
}

echo 15;


?>