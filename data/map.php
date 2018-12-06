  <?php
        
		require 'conn.php';
	define("API_KEY","AIzaSyDn1JrKoNqygrc0Wjei_wpPCSFIJXvvclk");	

    ?>
	

<html>
<link rel="stylesheet" type="text/css" href="css/animate.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="js/jquery.js"></script>
 <script src="js/bootstrap.min.js"></script>
<script src="js/wow.min.js"></script>
 <script>
 new WOW().init();
 </script>

<body >






<div class="container">



<div class=" form-inline wow fadeInLeft" >

<form action="" onload="<?php $_SERVER['PHP_SELF'];?>" method="post">

<table>
<tr>
<td>
<label class=" control-label text-success">Select city  </label></td>
<td>  <select id="location" class="form-control"name="location" value="<?php echo htmlentities($_POST['location']);?>">



<option >vellore</option><option>Tiruvannamalai</option>
<option>Kanchipuram</option>
<option>Theni</option>
<option>Madurai</option>
<option>Thirunelveli</option>
<option>Chennai</option>
<option>Vandavasi</option>
<option>Selam</option>
<option>Kanyakumari</option>
<option>Nagapatnam</option>
<option>Thiruchirapalli</option>
<option>Namakkal</option>
<option>Pondichery</option>
</select>   </td>

<td> <label class=" control-label text-success"> Select store </label>
</td>
<td>  <select   id="store" class="form-control "name="store" value="<?php echo htmlentities($_POST['store']);?>" >



<option>fertilizer</option><option>seed</option>

</select>  </td>
<td> <input  id='find'type=submit class=' btn btn-success form-control' name='find' value='Find location'></td> </tr></table>

</form>

</div>
</div>








<?php  

if(isset($_POST['find'])){

 

 $location= $_POST['location'];  
  $store=$_POST['store'];
  
  
		$query="SELECT * FROM marker where city='$location' and typ='$store' ";
	
		
		function qry($stmt){
		
	 $stmt =$GLOBALS["query"];
		
		return $stmt;
		}
		
		
		echo"<div id='map' class= 'col-md-8'  style= 'width:100%;height:500px '></div>";
}
else
{
	
	$query="SELECT * FROM marker where city='not' and typ='not' ";
		
		
	function qry($stmt){
			
	 $stmt ="SELECT * FROM marker where city='nullll'";	
		
		return $stmt;
		}
		
		echo"<div id='map' class= 'col-md-8'  style= 'width:100%;height:500px '></div>";
}

		
?>	





<script>
function myMap() {
	
	
		
  var myCenter = new google.maps.LatLng(12.885058,79.136276);
  var mapCanvas = document.getElementById('map');
  var mapOptions = {center: myCenter, zoom:14};
  var map = new google.maps.Map(mapCanvas, mapOptions);
  
  <?php
require 'conn.php';
  $locations=array();
  
  
            $stmt=qry();
       

              $r=sqlsrv_query($conn,$stmt);

	   $number_of_rows =sqlsrv_num_rows($r);  
       echo $number_of_rows;
      while( $row = sqlsrv_fetch_array( $r, SQLSRV_FETCH_ASSOC) ) {
            $name = $row['name'];
			$latitude = $row['lat'];
            $longitude = $row['long'];                              
    ?>      

		   
		   
		    
  var marker = new google.maps.Marker({position:new google.maps.LatLng(<?php echo $latitude;?>,<?php echo $longitude;?>) });
  marker.setMap(map);

  var infowindow = new google.maps.InfoWindow({
    content:  '<?php echo $name ?>'
  });
  infowindow.open(map,marker);
		   
	<?php
	  }
	  
	  
?>	  
	
          }



	  
</script>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA4Dr5FU2nftfgZj4N7x7vX5VPBdV-Vtbc&callback=myMap"></script>

</body>
</html>
