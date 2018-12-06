 <?php
 
 require 'conn.php';	

  $place="vellore" ;
$content = file_get_contents ('http://api.openweathermap.org/data/2.5/weather?q='.$place.'&appid=041426ba66bc8245eb2aeb1d452f01cc');
$weather_data  = json_decode ($content, true);
$weather_temp = $weather_data['main']['temp'];
$temperature_сelsiuss = $weather_temp-"273,15";
$humiditys = $weather_data['main']['humidity'];
$winds = $weather_data['wind']['speed'];
$icons = $weather_data['weather'][0]['icon'];
$descriptions = $weather_data['weather'][0]['description'];
$skys = $weather_data['weather'][0]['main'];
$citys = $weather_data['name'];


try {


 //$stmt= "UPDATE weather SET temperature_сelsius=?, humidity=?, wind=?,icon=?,descriptions=?,sky=?,city=? WHERE city=?";
	$stmt="update weather set temperature_сelsius='$temperature_сelsiuss',humidity='$humiditys',wind='$winds',icon='$icons',descriptions='$descriptions',sky='$skys' where city='$citys'";
	echo $stmt;
//$params = array($temperature_сelsiuss, $humiditys, $winds, $icons, $descriptions, $skys,$citys,$citys);  

  
//$prep=sqlsrv_query( $conn, $stmt, array(&$temperature_сelsius, &$humidity, &$wind, &$icon, &$description, &$sky,&$city,&$city));
//$stmt="insert into  weather values('$temperature_сelsius','$humidity','$wind','$icon','$description','$sky','$city')";
	//sqlsrv_prepare($conn,$stmt);
	//$getResults=sqlsrv_execute($conn,$stmt);
	
	$getResults =sqlsrv_query( $conn, "UPDATE WEATHER SET descriptions='this is test update' where city='arcot'");//,$params);//, array(&$temperature_сelsius, &$humidity, &$wind, &$icon, &$description, &$sky,&$city,&$city));
	
	echo $getResults;
if($getResults === false)

{
	echo "not inserted";
    die(print_r(sqlsrv_errors(), true));
 echo implode(sqlsrv_errors());
}
	
	if ($getResults == true) {
    echo "New record created successfully";
	 sqlsrv_commit( $conn );
} 




	
}
catch (PDOException $e) {
    echo "Error connecting to SQL Server.";
  
}




?>
