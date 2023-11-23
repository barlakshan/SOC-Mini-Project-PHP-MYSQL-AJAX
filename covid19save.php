<?php 
require_once('dbsave.php');
$query = "SELECT * FROM covidcases";
$result = mysqli_query($conn, $query);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> 
        <!--Link boostrap file-->
        <script src="https://code.jquery.com/jquery-3.7.0.min.js"
            integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
        <title>Covid19 Information</title>
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
            <div class="row">
                <div class="col-md-1">&nbsp;</div>
                <div class="col-md-10">
                    <h4 class="text-center">Saved Covid-19 Information</h4>
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Country Name</th>
                            <th scope="col">Population</th>
                            <th scope="col">Total Cases</th>
                            <th scope="col">Deaths</th>
                            <th scope="col">Tests</th>
                            <th scope="col">Continent</th>
                            <th scope="col">Date</th>
                            </tr>
                            <tr>
                                <?php
                                
                                while($row = mysqli_fetch_assoc($result))
                                {
                                ?>
                                <td><?php echo $row['countryName'] ?></td>
                                <td><?php echo $row['population'] ?></td>
                                <td><?php echo $row['totalcases'] ?></td>
                                <td><?php echo $row['deaths'] ?></td>
                                <td><?php echo $row['tests'] ?></td>
                                <td><?php echo $row['continent'] ?></td>
                                <td><?php echo $row['date'] ?></td>
                            </tr>
                                <?php
                                }
 
                                ?>
                        </thead>
                        <tbody id="records">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>