<?php 
require_once('db.php');
function query($sql){
		global $conn;
		return mysqli_query($conn,$sql);
	}
	
mysql_connect("localhost","root","");
mysql_select_db('area_name');
if(isset($_POST['b1']))$name1 = $_POST['b1'];
else $name1="";
$stat= "select * from area_name where id='$name1' ";
$row2= mysql_query($stat) or die(mysql_error()); 



        file_put_contents("$name1.txt","$name1-River".PHP_EOL.PHP_EOL,FILE_APPEND);
while($row = mysql_fetch_array($row2))
{
	$lat= $row[2];
    $long = $row[3];
	$rnegative = $row[15];
$rpositive=$row[16];
$impact=$row[17];	
$pimpact=$row[18];
       
        file_put_contents("$name1.txt","Area-Name -->$row[1]".PHP_EOL,FILE_APPEND);
        file_put_contents("$name1.txt","R Negative->$rnegative".PHP_EOL,FILE_APPEND);
        file_put_contents("$name1.txt","R Positive->$rpositive".PHP_EOL,FILE_APPEND);
        file_put_contents("$name1.txt","R Value (Impact) : $impact".PHP_EOL,FILE_APPEND);
		//file_put_contents("$name1.txt","Impact on Population : $pimpact".PHP_EOL,FILE_APPEND);

        if($impact>0.8)
        {
           file_put_contents("$name1.txt","Status:Severe".PHP_EOL,FILE_APPEND);
		   if ($row[10]>12)
        file_put_contents("$name1.txt","Remedy 1 : The car repair shops are more and hence these are responsible for pollution".PHP_EOL.PHP_EOL,FILE_APPEND);
	else 
		file_put_contents("$name1.txt","There is no need to concentrate on the number of car repair shops as these are in control.".PHP_EOL.PHP_EOL,FILE_APPEND);
	if ($row[11]>12)
	file_put_contents("$name1.txt","Remedy 2 : The car wash stations are responsible at some extent for the water pollution".PHP_EOL.PHP_EOL,FILE_APPEND);	
	else
		file_put_contents("$name1.txt","There is no need to concentrate on the number of car wash stations as these are in control.".PHP_EOL.PHP_EOL,FILE_APPEND);
	if ($row[12]>12)
	file_put_contents("$name1.txt","Remedy 3 : The number of gas stations are more and are causing the pollution".PHP_EOL.PHP_EOL,FILE_APPEND);	
	else
		file_put_contents("$name1.txt","There is no need to concentrate on the number of gas stations as these are in control.".PHP_EOL.PHP_EOL,FILE_APPEND);
	if ($row[14]>8)
	file_put_contents("$name1.txt","Remedy 4 : The number of laundry are above a level.The water extracted from laundries makes rivers polluted.".PHP_EOL.PHP_EOL,FILE_APPEND);	
	else
		file_put_contents("$name1.txt","There is no need to concentrate on the number of laundries as these are in control.".PHP_EOL.PHP_EOL,FILE_APPEND);
	
	
	
		}
        else if($impact<=0.8&&$impact>=0.5)
        {
           file_put_contents("$name1.txt","Status:Moderate".PHP_EOL,FILE_APPEND);
		   if ($row[10]>12)
        file_put_contents("$name1.txt","Remedy 1 : The car repair shops are more and hence these are responsible for pollution".PHP_EOL.PHP_EOL,FILE_APPEND);
	else 
		file_put_contents("$name1.txt","There is no need to concentrate on the number of car repair shops as these are in control.".PHP_EOL.PHP_EOL,FILE_APPEND);
	if ($row[11]>12)
	file_put_contents("$name1.txt","Remedy 2 : The car wash stations are responsible at some extent for the water pollution".PHP_EOL.PHP_EOL,FILE_APPEND);	
	else
		file_put_contents("$name1.txt","There is no need to concentrate on the number of car wash stations as these are in control.".PHP_EOL.PHP_EOL,FILE_APPEND);
	if ($row[12]>12)
	file_put_contents("$name1.txt","Remedy 3 : The number of gas stations are more and are causing the pollution".PHP_EOL.PHP_EOL,FILE_APPEND);	
	else
		file_put_contents("$name1.txt","There is no need to concentrate on the number of gas stations as these are in control.".PHP_EOL.PHP_EOL,FILE_APPEND);
	if ($row[14]>8)
	file_put_contents("$name1.txt","Remedy 4 : The number of laundry are above a level.The water extracted from laundries makes rivers polluted.".PHP_EOL.PHP_EOL,FILE_APPEND);	
	else
		file_put_contents("$name1.txt","There is no need to concentrate on the number of laundries as these are in control.".PHP_EOL.PHP_EOL,FILE_APPEND);
		}
        else
			
         file_put_contents("$name1.txt","Status:Good The pollution level is very low and under control".PHP_EOL,FILE_APPEND);
    }    

?>

<html>
<head>
    <style type="text/css">
        html, body { height: 100%; margin: 0; padding: 0; }
        #map { height: 100%; margin-top:20px }
    
	.navhead
	{
		font-weight:bold;
		font-family: Georgia;
	background:#e6ccff;
	}
	
	</style>
	  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">

	  
	  
	  
	  

    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap">
    </script>

<script type="text/javascript">

    var map;
    var marker;

    function initMap()
    {
		var map = new google.maps.Map(document.getElementById('map'), {
		zoom: 7,
		center: 
		{
		 <?php 
			if(isset($_POST['b1'])){
			$sql ="SELECT * FROM area_name where id= '{$_POST['b1']}' ";
			$result = query($sql);
			if($result){
				$row = mysqli_fetch_assoc($result);
				echo "lat: {$row['latitude']}, lng: {$row['longitude']}";
			}
			}
			else {
					echo "lat: 25, lng:78";
			}
		 ?>
		}
		});
		
		
  <?php 
		
	if(isset($_POST['b1'])){
		$sql ="SELECT * FROM area_name where id= '{$_POST['b1']}' order by latitude asc";
		$result = query($sql);
		
		if($result){
			while($row = mysqli_fetch_assoc($result)){
				echo " var marker = new google.maps.Marker({ position:{lat: ". $row['latitude'].", lng: ". $row['longitude']."}, map: map, title: '{$row['area']}'} );";
			}
		}
		else
		{
			echo "Something went wrong ".$sql;
		}
	}
  ?>
    }

    function loaddata()
    {
        var geocoder = new google.maps.Geocoder();
        geocodeAddress(geocoder,map);
    }

    function geocodeAddress(geocoder, resultsMap)
    {
        var address = document.getElementById('address').value;
        geocoder.geocode({'address': address}, function(results, status) {
            if (status === google.maps.GeocoderStatus.OK)
            {
                resultsMap.setCenter(results[0].geometry.location);
                var marker = new google.maps.Marker({
                    map: resultsMap,
                    position: results[0].geometry.location
                });
                alert(results[0].geometry.location);
            }
            else {
                alert('Geocode was not successful for the following reason: ' + status);
            }
        });
    }
</script>


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

<form method="post" class="panel panel-default" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<h2 style="color:black;margin-left:30px;"> <?php if(!isset($_POST['b1'])){ ?>Select River Name <?php } else { echo "Selected River is ".$_POST['b1']; }?></h2>
<div class="form-group col-md-8-offset-2">
<div class="col-md-6">
<select name="b1" class="form-control">
  <option value="ganga">Ganga</option>
  <option value="yamuna">Yamuna</option>
  <option value="brahmputra">Brahmputra</option>
  <option value="krishna">Krishna</option>
  <option value="mahanadi">Mahanadi</option>
  <option value="tapti">Tapti</option>
  <option value="godavari">Godavari</option>
  <option value="kaveri">Kaveri</option>
  <option value="narmada">Narmada</option>
  <option value="ghaghra">Ghaghra</option>
  <option value="gomti">Gomti</option>
</select>
</div>
<div class="col-md-3">
<input type="submit" class="form-control btn btn-success" onsubmit="loaddata()">
</div>
<div class="col-md-3">
<?php if($name1!=""){ ?>
	<a href="<?php echo $name1.".txt"; ?>" class="btn btn-primary" download>Download Report</a>
<?php } ?>
</div>

</div>
<div style="clear:both"></div>
<div id="map"></div>
</form>
</body>

</html>