<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$db = 'area_name';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}