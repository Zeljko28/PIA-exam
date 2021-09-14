<?php

$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "db";

$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName) or die("Can't connect: " . mysqli_connect_error());