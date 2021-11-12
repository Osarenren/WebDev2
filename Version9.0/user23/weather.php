<?php
$apiKey = "9f722550fdc5493214edfa8aed5f45f9"; //You will need to add in the 
$cityId = "5046997"; //5046997 Shakopee City Id
$units = "imperial";//metric-Celcius  imperial-Farhenheit
if ($units == 'metric'){//Changes the $temp varaible to match 
    $temp = "C";
}
else {
    $temp = "F";
}
$googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?id=" . $cityId . "&lang=en&units=" . $units . "&APPID=" . $apiKey;

$ch = curl_init();

curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);

curl_close($ch);
$data = json_decode($response);
$currentTime = time();
?>

<!doctype html>
<html>
<head>
<title>Forecast Weather using OpenWeatherMap with PHP</title>
<style>
body {
    font-family: Arial;
    font-size: 0.95em;
    color: #929292;
    background-color:<?php 
    if($data->main->temp >= 30){
    echo "Weather is good for going out";    
    }
    if ($data->main->temp < 30){
        echo "bad";
    }?>
}

.report-container {
    border: #E0E0E0 1px solid;
    padding: 20px 40px 40px 40px;
    border-radius: 2px;
    width: 550px;
    margin: 0 auto;
    background-color:<?php 
    if($data->main->temp >= 30){
    echo "blue";    
    }
    if ($data->main->temp < 30){
        echo "red";
    }?>
    
}

.weather-icon {
    vertical-align: middle;
    margin-right: 20px;
}

.weather-forecast {
    color: #212121;
    font-size: 1.2em;
    font-weight: bold;
    margin: 20px 0px;
}

span.min-temperature {
    margin-left: 15px;
    color: #929292;
}

.time {
    line-height: 25px;
}
.topnav {
            background-color: rgb(211, 89, 33);
            overflow: hidden;
        }

        /* Style the links inside the navigation bar */
        .topnav a {
            float: left;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        /* Change the color of links on hover */
        .topnav a:hover {
            background-color: #04AA6D;
            color: white;
        }

        /* Add a color to the active/current link */
        .topnav a.active {
            background-color: #04AA6D;
            color: white;
        }

        header {
            background-color: rgb(211, 89, 33);
        }

        #h1-title {
            margin-bottom: 0vmax;
            text-align: center;
        }

        .images-3 {
            margin: 2em;
        }
</style>

</head>
<body>
<div>
        <nav class="topnav" id="navbarCollapse">
            <a href="http://localhost:8080/WebDev2/Version9.0/user23/index.php" class="active">Home</a>
            <a href="best-restaurants.html">Best Restaurants in the world</a>
            <a href="cheap-restaurants.html">Cheap Restaurants</a>
            <a href ="http://localhost:8080/WebDev2/Version9.0/user23/weather.php">Search Restaurants</a>
            <div class="weather-forecast">
            <img
                src="http://openweathermap.org/img/w/<?php echo $data->weather[0]->icon; ?>.png"
                class="weather-icon" /> <?php echo $data->main->temp_max; ?>&deg;<?php echo $temp; ?><span
                class="min-temperature"><?php echo $data->main->temp_min; ?>&deg;<?php echo $temp; ?></span>
        </div>
            </nav>
        </div>
    <div class="report-container">
        <h2><?php echo $data->name;?> Weather Status</h2>
        
        <div class="time">
           <div><?php echo date("jS F, Y",$currentTime);?></div>
        </div>
        <div class="weather-forecast">
            <img
                src="http://openweathermap.org/img/w/<?php echo $data->weather[0]->icon; ?>.png"
                class="weather-icon" /><?php echo $data->main->temp_max; ?>&deg;<?php echo $temp; ?><span
                class="min-temperature"><?php echo $data->main->temp_min; ?>&deg;<?php echo $temp; ?></span>
        </div>
        <div class="time">
            <div>Humidity: <?php echo $data->main->humidity; ?> %</div>
            <div>Wind: <?php echo $data->wind->speed; ?> km/h</div>
        </div>
    </div>


</body>
</html>