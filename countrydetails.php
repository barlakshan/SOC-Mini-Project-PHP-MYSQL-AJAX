<?php

$cid = $_GET['cid'];
$path = "https://restcountries.com/v3.1/alpha/" . $cid;
$data = json_decode(file_get_contents($path), true);





?>

<html>

<head>
    <meta charset="UTF-8">
    <title>Countries Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!--Link boostrap -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
            integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <!--Link javascript CDN-->
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
            <h2 class="text-center">
                <?php echo $data[0]['name']["common"]; ?>
            </h2>
        </div>
        <div class="row">
            <div class="col-1">&nbsp;</div>
            <div class="col-10">
                <div class="clearfix">&nbsp;</div>
                <table border="1" class="table table-striped">
                    <tr>
                        <td colspan="2" style="text-align: center">
                            <img src="<?php echo $data[0]['flags']['png']; ?>" />
                        </td>
                    </tr>

                    <tr>
                        <th>Official Name </th>
                        <th>
                            <?php echo $data[0]['name']["official"]; ?>
                        </th>
                    </tr>

                    <tr>
                        <th>Capital </th>
                        <th>
                            <?php echo $data[0]['capital'][0]; ?>
                        </th>
                    </tr>

                    <tr>
                        <th>Code </th>
                        <th>
                            <?php echo $data[0]['cca2']; ?>
                        </th>
                    </tr>

                    <tr>
                        <th>Currency </th>
                        <th>

                            <?php
                            foreach ($data[0]['currencies'] as $currency) {
                                echo $currency['name'] . " " . $currency['symbol'] . "<br>";
                            }
                            ?>
                        </th>
                    </tr>

                    <tr>
                        <th>Subregion </th>
                        <th>
                            <?php echo $data[0]['subregion']; ?>
                        </th>
                    </tr>

                    <tr>
                        <th>Continent </th>
                        <th>
                            <?php echo $data[0]['continents'][0]; ?>
                        </th>
                    </tr>

                    <tr>
                        <th>Languages </th>
                        <th>
                            <?php
                            foreach ($data[0]['languages'] as $key => $value) {
                                echo $value . ",";

                            }
                            ?>
                        </th>
                    </tr>

                    <tr>
                        <th>Borders </th>
                        <th>
                            <?php
                            foreach ($data[0]['borders'] as $key => $value) {
                                echo $value . ",";

                            }
                            ?>
                        </th>
                    </tr>

                    <tr>
                        <th>Population </th>
                        <th>
                            <?php
                            echo $data[0]['population'];
                            ?>
                        </th>
                    </tr>

                    <tr>
                        <th>Area</th>
                        <th>
                            <?php
                            echo $data[0]['area'];
                            ?>
                        </th>
                    </tr>

                </table>

            </div>
</body>



</html>