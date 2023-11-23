<?php

$country_name = $_GET['countryname'];
$city_name = $_GET['cityname'];

$path = "https://restcountries.com/v3/name/" . $country_name;
$country_data = json_decode(file_get_contents($path), true);



function callApi($query)
{
    $url = "https://city-and-state-search-api.p.rapidapi.com/search?q=" . $query;
    $headers = array(
        'X-RapidAPI-Key: 1bff39057amshae532404e794633p155345jsn47b232895229',
        'X-RapidAPI-Host: city-and-state-search-api.p.rapidapi.com'
    );

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

    $response = curl_exec($curl);
    $error = curl_error($curl);

    curl_close($curl);

    if ($error) {
        $result = array('error' => $error);
        
    } else {
        $result = json_decode($response, true);
    }

    return $result;
}

$city_data = callApi($city_name);

?>

<html>

<head>
    <meta charset="UTF-8">
    <title>Ctiy Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <!--Link boostrap file-->
</head>

<body>
    <div class="text-light bg-dark" style="height: 35px;">
        <h4 class="text-center"  >B.A.Ravindu Lakshan - IT2020002</h4>
    </div>
    <div class="container-fluid">
    <div class="nav d-flex justify-content-end">
        <a class="l1" href="index.php">Home</a>
        <div>&nbsp;RestFull Web Service</div>
    </div>
    </div>  
    <div class="container">
        <div>
            <h2 class="text-center">Ctiy Information</h2>
        </div>
        <div class="row">
            <div class="col-1">&nbsp;</div>
            <div class="col-10">
                <div class="clearfix">&nbsp;</div>
                <table class="table" class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">City ID</th>
                            <td>
                                <?php 
                              
                                echo($city_data[0]["id"]); ?>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">City Name</th>
                            <td>
                            <?php 
                              
                              echo($city_data[0]["name"]); ?>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">State Name</th>
                            <td>
                            <?php 
                            //   print_r($city_data) ;
                              echo($city_data [1]["state_name"]); ?>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Country Name</th>
                            <td>
                            <?php 
                              
                              echo($city_data[0]["country_name"]); ?>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Country Flag</th>
                            <td colspan="2" style="text-align: center">
                   
                     
                                <img src="<?php 
                                echo $country_data[0]["flags"][0]; ?>" style="width: 200px;" />
                            </td>
                        </tr>
                        
                    </tbody>
                </table>
                <div id="map" style="position:inherit !important;width:1000px !important;height:400px !important;"></div></div>
            </div>
        </div>
    </div>
<script>
  function initMap() {
    var geocoder = new google.maps.Geocoder();
    var mapOptions = {
      zoom: 10,
      center: { lat: 0, lng: 0 } 
    };
    var map = new google.maps.Map(document.getElementById("map"), mapOptions);
    var address = "<?php echo $city_name; ?>" 

    geocoder.geocode({ address: address }, function (results, status) {
      if (status === google.maps.GeocoderStatus.OK) {
        map.setCenter(results[0].geometry.location);
      } else {
        console.log("Geocode was not successful for the following reason: " + status);
      }
    });
  }

  function loadMap() {
    var script = document.createElement("script");
    script.src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyDyptA3QXp6-LhbF_5phg_Tqqr6I7dwrPA&callback=initMap";
    document.body.appendChild(script);
  }

  loadMap();
</script>
</body>

</html>