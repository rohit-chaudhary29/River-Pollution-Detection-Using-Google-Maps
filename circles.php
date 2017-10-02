<?php

  $hostname = "localhost";
  $username = "root";
  $password = "";
  $database = "area_name";


  $conn = mysql_connect("$hostname","$username","$password") or die(mysql_error());
  mysql_select_db("$database", $conn) or die(mysql_error());


    $result =  mysql_query("SELECT * FROM area_name WHERE id='$_POST[b1]'");
    $count = mysql_num_rows($result); 
    //echo $result;

?>




<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Circles</title>
    
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
<style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
      }
	  
	  .navhead
	{
		font-weight:bold;
		font-family: Georgia;
	background:#e6ccff;
	}

    </style>
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
  <div><img src="img/map-info.png"></img></div>
    <div id="map"></div>


   <script>

      function initMap() {

         var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 7,
          center: {lat: 22.719568, lng: 75.857727},
          mapTypeId: google.maps.MapTypeId.TERRAIN


        });

    <?php

    while($row=mysql_fetch_assoc($result))
    {  

    ?>
          var rvalue = <?php echo $row['impact'];  ?>;
          var rpvalue = <?php echo $row['pimpact']; ?>;
          var currentlat = <?php echo $row['latitude'] ?>;
          var currentlong = <?php echo $row['longitude'] ?>;
          var arealength = <?php echo $row['arealength'] ?>;

          console.log("a"+rvalue);
          console.log("b"+rpvalue);
          console.log("c"+currentlat);
          console.log("d"+currentlong);
          console.log("e"+arealength);

            if(rvalue < 0.5){
                                       var cityCircle = new google.maps.Circle({
                                                                                     strokeColor: '#FF0000',
                                                                                     strokeOpacity: 0.8,
                                                                                     strokeWeight: 2,
                                                                                     fillColor: '#4dff4d',
                                                                                     fillOpacity: 0.35,
                                                                                     map: map,
                                                                                     center: {lat: currentlat, lng: currentlong},
                                                                                     radius: 10000
                                                                              });
          }

          else if(rvalue > 0.8){


                                      var cityCircle = new google.maps.Circle({
                                                                                     strokeColor: '#FF0000',
                                                                                     strokeOpacity: 0.8,
                                                                                     strokeWeight: 2,
                                                                                     fillColor: '#000000',
                                                                                     fillOpacity: 0.35,
                                                                                     map: map,
                                                                                     center: {lat: currentlat, lng: currentlong},
                                                                                     radius: 10000
                                                                              });

          }

          else {

                                      var cityCircle = new google.maps.Circle({
                                                                                     strokeColor: '#FF0000',
                                                                                     strokeOpacity: 0.8,
                                                                                     strokeWeight: 2,
                                                                                     fillColor: '#ff4d4d',
                                                                                     fillOpacity: 0.35,
                                                                                     map: map,
                                                                                     center: {lat: currentlat, lng: currentlong},
                                                                                     radius: 10000
                                                                              });

          }

















        
      <?php }  ?>
   
      }


    </script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap">
    </script>  </script>

  </body>
</html>