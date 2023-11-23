<?php
$dataset = $_POST['dataset'];
foreach ($dataset as $record) {
    
}
 
$host = "localhost"; 
$username = "root";
$password = "";
$database = "covid2023";

$conn = mysqli_connect($host,$username,$password,$database);
if($conn){
    $records = mysqli_query($conn, "SELECT * FROM covidcases");
    if(mysqli_num_rows($records) == 0){
        foreach ($dataset as $country) {
       
            $countryName = $country["country"];
            $population = $country["population"];
            $totalcases = $country["cases"]["total"];
            $deaths = $country["deaths"]["total"];
            $tests = $country["tests"]["total"];
            $continent = $country["continent"];
            $date = $country["day"];
    
        
            $query = "INSERT INTO `covidcases` 
                (`countryName`, `population`, `totalcases`, `deaths`, `tests`, `continent`, `date`) 
                VALUES ('$countryName', ' $population', '$totalcases', '$deaths',
                '$tests', '$continent', '$date')";
            $result = mysqli_query($conn,$query);
            
            if($result){
                echo "Data inserted successfully!";
            }else{
                $error = mysqli_error($conn);
                echo "Query execution failed. Error: " . $error;
            }
       
        }
    }

 
}else{
    echo "Database connection error";
}



?>