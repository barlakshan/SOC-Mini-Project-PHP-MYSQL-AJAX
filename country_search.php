<html>
    <head>
        <meta charset="UTF-8">
        <title>Countries Details</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> 
        <!--Link boostrap file-->
        <script src="https://code.jquery.com/jquery-3.7.0.min.js"
            integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
        <!--Link javascript CDN-->
        </head>
    <body>
    <div>
                <h2 class="text-center">City Information</h2>
            </div>
            <div class="row">
                <div class="col-1">&nbsp;</div>
                <div class="col-10">
                    <div class="clearfix">&nbsp;</div>
                    <table class="table table-striped">
                        <tr>
                            <th class="text-primary">Search City</th>
                            <th><input type="text" id="city_name" name="city_name" class="col-8"></th>
                        </tr>
                    </table>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">City Name</th>
                                <th scope="col">State Name</th>
                                <th scope="col">Country</th>
                            </tr>
                        </thead>
                        <tbody id="cities">

                        </tbody>
                    </table>

                </div>

            </div>
        </div>
        <script>


            $('#city_name').keyup(function () {
                var cityName = $('#city_name').val();
                if (cityName && cityName !== "") {
                    callApi(cityName);
                } else {
                    $("#cities").empty();

                }

                // Call the API
                function callApi(query) {
                    const settings = {
                        async: true,
                        crossDomain: true,
                        url: `https://city-and-state-search-api.p.rapidapi.com/search?q=${query}`,
                        method: 'GET',
                        headers: {
                            'X-RapidAPI-Key': '1bff39057amshae532404e794633p155345jsn47b232895229',
                            'X-RapidAPI-Host': 'city-and-state-search-api.p.rapidapi.com'
                        }
                    };

                    $.ajax(settings).done(function (response) {

                        html = "";
                        for (var i = 0; i < 5; i++) {

                            html +=
                                `<tr>
                                    <th scope="row">${response[i].id}</th>
                                    <td>${response[i].name}</td>
                                    <td>${response[i].state_code}</td>
                                    <td>${response[i].country_name}</td>
                                    <td><a class="btn btn-success" href="citydetails.php?countryname=${response[i].country_name}&cityname=${response[i].name}">City Details</a></td>
                                </tr>`;
                        }


                        $("#cities").empty();
                        $("#cities").append(html);

                    });

                }



            });
        </script>
    </body>
</html>

