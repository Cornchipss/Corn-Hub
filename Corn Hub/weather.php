<!-- Improved weather page (Thanks domagoj for the help) -->
<!DOCTYPE html>
<html>
    <head>
		<?php global $title; $title = 'This Day in History'; require('headinfo.php'); ?>

		<link rel="icon" href="images/favicon.jpg">
		<script src="js/weather.js"></script>
		<link rel="stylesheet" media="all" href="styles/weather.css">
    </head>
    <body>
        <span class="col-xs-12 spinner"><img src="images/loader.png" width="50" height="50"></span>

        <div class="container-fluid text-center">
            <span class="city text-center"></span>
            <div class="col-xs-12">
                <input type="submit" id="change" class="btn btn-primary" value="&deg;F">
                <input type="text" id="input-city" placeholder="Enter City">
                <input type="submit" id="submit" class="btn btn-primary" value="Go">
            </div>
            <div class="row text-center">
                <div class="col-xs-6">
                  <img class="condition-icon img-responsive center-block" style="width: 20%; height: 20%;" src="">
                  <span class="weather-descr"></span>
                </div>
                <div class="col-xs-6 tdiv">
                    <span class="temp"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-md-4">
                    <img src="images/humidity.png" class="img-responsive center-block img-rad"style="max-width:30%;min-width:50px;">
                    <span class="humid"></span>
                </div>
                <div class="col-xs-12 col-md-4">
                    <img src="http://image.flaticon.com/icons/png/512/10/10442.png" class="compass img-responsive center-block img-rad" style="max-width:30%;min-width:50px;">
                    <span class="wind center-block"></span>
                </div>
                <div class="col-xs-12 col-md-4">
                    <img src="images/pressure-gage.png" class="img-responsive center-block img-rad" style="max-width:30%;min-width:50px;">
                    <span class="pressure"></span>
                </div>
            </div>
        </div>
    </body>
</html>
