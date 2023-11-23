<html>

<head>
    <meta charset="UTF-8">
    <title>Countries Details</title>
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
            <h2 class="text-center">Asian Countries</h2>
        </div>

        <?php
        $path = "https://restcountries.com/v3.1/region/asia"; //link to Rest API(region Asia)
        $data = json_decode(file_get_contents($path), true);

        ?>

        <table border="1" class="table table-striped ">
            <tr>
                <th class="text-primary">Flag</th>
                <th class="text-primary">Country Name</th>
                <th class="text-primary">Capital City</th>
                <th class="text-primary">Region</th>
                <th class="text-primary">Subregion</th>
                <th class="text-primary">Currencies</th>
                <th class="text-primary">Country Code</th>
                <th>&nbsp;</th>
            </tr>

            <tr>
            <tr>
                <?php
                foreach ($data as $value) {
                    if ($value['region'] == 'Asia') {


                        ?>
                    <tr>
                        <td><img src="<?php echo $value['flags']['png']; ?>" width="50px" /></td>
                        <td>
                            <?php echo $value['name']['common'] ?>
                        </td>

                        <td>
                            <?php if (empty($value['capital'][0])) {
                                echo "NULL";
                            } else {
                                $capital = $value['capital'][0];
                                echo $value['capital'][0];
                            } ?>
                        </td>

                        <td>
                            <?php echo $value['region']; ?>
                        </td>
                        <td>
                            <?php echo $value['subregion'] ?>
                        </td>
                        <td>
                            <?php


                            foreach ($value['currencies'] as $currency) {
                                echo $currency['name'] . " " . $currency['symbol'] . "<br>";
                            }

                            ?>
                        </td>

                        <td>
                            <?php echo $value['cca2'] ?>
                        </td>
                        <td><a class="btn btn-success" href="countrydetails.php?cid=<?php echo $value['cca2']; ?>">View </a>
                        </td>


                        <?php
                    }
                }
                ?>
            </tr>
            </tr>
        </table>


    </div>




</body>

</html>