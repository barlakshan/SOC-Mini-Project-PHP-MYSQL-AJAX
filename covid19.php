<html>
    <head>
    <meta charset="UTF-8">
    <title>Countries Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!--Link boostrap file-->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
            integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
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
            <h2 class="text-center">COVID19 Information in Europe</h2>
        </div>
        <div class="raw">
            <div class="col-1">&nbsp;</div>
            <div class="col-8">
                <div class="clearfix">&nbsp;</div>
            </div>
            <table class="table">
            <thead>
                <tr>
                <th scope="col">Country</th>
                <th scope="col">Population</th>
                <th scope="col">Total Covid Cases</th>
                <th scope="col">Total Deaths</th>
                <th scope="col">Tests</th>
                <th scope="col">Continent</th>
                </tr>
            </thead>
            <tbody id="records"></tbody>
        </table>
        </div>
        </div>
    </body>
    <script>
    const settings = {
        async: true,
        crossDomain: true,
        url: 'https://covid-193.p.rapidapi.com/statistics',
        method: 'GET',
        headers: {
            'X-RapidAPI-Key': '1bff39057amshae532404e794633p155345jsn47b232895229',
            'X-RapidAPI-Host': 'covid-193.p.rapidapi.com'
        }
    };

    $.ajax(settings).done(function (response) {
       
        var html="";

        response.response.forEach(country => {
            if(country.continent=="Europe"){
  
             html =
                    `<tr>
                            <td >${country.country}</td>
                            <td>${country.population}</td>
                            <td>${country.cases.total}</td>
                            <td>${country.deaths.total}</td>
                            <td>${country.tests.total}</td>
                            <td>${country.continent}</td>
                           
                    </tr>`;
                    
                   
            $("#records").append(html);
        }
        });


    });
    </script>
</html>