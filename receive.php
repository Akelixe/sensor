<?php

$value = $_POST['capteur'];
$card = $_POST['id'];

$con = mysqli_connect( "localhost", "root", "", "sensor_db" );
$res = mysqli_query( $con, "INSERT INTO `sensor` VALUES (NULL, $value, '$card', NULL)" );

mysqli_close($con);

?>