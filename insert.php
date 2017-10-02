<html>
<head>
<title>Add New Record in MySQL Database</title>

<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Change The Words</title>
  <!-- Style (Main) -->
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/animate.changethewords.css">

<style>
.navhead
	{
		font-weight:bold;
		font-family: Georgia;
	background:#e6ccff;
	}
	.data{
		font-weight:bold;
		color:blue;
		text-align:center;
		font-size:200%;
	}
</style>
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
</head>
<body>
<div class="navhead">
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <a class="navbar-brand page-scroll"><font color="green"> RIVER POLLUTION DETECTION USING GOOGLE MAPS</font></a>
				<ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="http://localhost/20/index.html"><font color="green">HOME</font></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="http://localhost/20/rivers.php"><font color="green">CHECK POLLUTION</font></a>
                    </li>
					<li>
					<a class="page-scroll" href="http://localhost/20/circle.html"><font color="green">VISUALIZATION ON MAP</font></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="http://localhost/20/submit.html"><font color="green">SUBMIT INFO</font></a>
                    </li>
                    
                </ul>
            </div>
			</div>
			
			
</body>
<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
$name1=$_POST['rname'];
$name2=$_POST['city'];
$name3 = $_POST['lat'];
$name4 = $_POST['long'];
$name5 = $_POST['pop'];
$name6 = $_POST['area'];

$cp = rand(5,12);
$cw = rand(3,8);
$gs = rand(7,32);
$ho = rand(4,18);
$la = rand(3,10);
$pa = rand(2,9);
$zoo = rand(1,3);
$un = rand(4,22);
$sc = rand(10,38);

$industry = $cp + $cw + $gs + $la;
$public = $ho + $pa + $zoo + $un + $sc;
$impact = $industry/$public;
$pimpact = $impact/$name5;


$sql = "INSERT INTO `insert`.`insert` (`id`, `area`, `latitude`, `longitude`, `population`, `arealength`, `car_repair`,`car_wash`,
`gas_station`,`hospital`,`laundry`,`park`,`zoo`,`university`,`school`,`industry`,`public`,`impact`,`pimpact`) 
VALUES ('$name1', '$name2', '$name3', '$name4', '$name5', '$name6','$cp','$cw','$gs','$ho','$la','$pa','$zoo','$un','$sc','$industry','$public','$impact','$pimpact');";

mysql_select_db('insert');

$retval=mysql_query($sql,$conn);
if(!$retval)
{
	die ('could not create database'.mysql_error());
}
else echo ' Success';

mysql_close($conn);
?>
<body>
<div class="data">
You have successfully entered the data.  </div>
<main>
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-md-push-1 col-xs-12 col-xs-push-0">
          <div id="changethewords">
            Thanks For
            <span data-id="1">Showing</span>
            <span data-id="2">Your</span>
            <span data-id="3">Interest</span>
            <span data-id="4">And</span>
            <span data-id="5">Providing</span>
            <span data-id="6">The</span>
            <span data-id="7">Data</span>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Changewords main js -->
  <script src="js/jquery.changethewords.js"></script>
  <script type="text/javascript">
    $(function() {
      $("#changethewords").changeWords({
        time: 1500,
        animate: "tada",
        selector: "span"
      });
    });
  </script>
</body>
</html>
