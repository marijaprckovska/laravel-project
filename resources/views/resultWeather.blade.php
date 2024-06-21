<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>

        <title>PHP Weather App</title>
        <style>
            body {
                font-family: 'Arial', sans-serif;
                background-color: #f0f8ff;
                color: #333;
                text-align: center;
                padding: 20px;
            }
            .container {
                max-width: 800px;
                margin: 0 auto;
                background: #fff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
            h1 {
                font-size: 2em;
                margin-bottom: 20px;
            }
            .form-container {
                margin-top: 20px;
            }
            .weather-data {
                border: 1px solid #ccc;
                padding: 20px;
                margin: 20px 0;
                background-color: #f9f9f9;
                border-radius: 8px;
            }
            .weather-data p {
                margin: 5px 0;
            }
            .image-container {
                text-align: center;
                margin-bottom: 20px;
            }
            .image-container img {
                max-width: 100%;
                height: auto;
                border-radius: 8px;
            }
            .instructions {
                margin-bottom: 20px;
                font-size: 1.2em;
                color: #666;
            }
            button {
                background-color: #007bff;
                color: white;
                padding: 10px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }
            button:hover {
                background-color: #0056b3;
            }
            a {
                color: #007bff;
                text-decoration: none;
            }
            a:hover {
                text-decoration: underline;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="image-container">
                <img src="{{ asset('images/photo_1.jpg') }}" alt="PHP Weather App">
            </div>

            <p class="instructions">You are checking the weather for:</p>

            <p>Longitude: {{ Request::get('lon') }}</p>
            <p>Latitude: {{ Request::get('lat') }}</p>
            <br />
            <?php
                $lat = request()->query('lat');
                $lon = request()->query('lon');
                $response = file_get_contents("https://api.openweathermap.org/data/2.5/weather?lat=$lat&lon=$lon&appid=f2a59c1df933fdc5d2c10f81914e40d8");

                $weatherData = json_decode($response, true);
            ?>

            <div class="weather-data">
                <h2>Weather Data for {{ $weatherData['name'] }}</h2>
                <p><strong>Coordinates:</strong> Longitude: <?php echo $weatherData['coord']['lon']; ?>, Latitude: <?php echo $weatherData['coord']['lat']; ?></p>
                <p><strong>Weather:</strong> <?php echo $weatherData['weather'][0]['main']; ?> - <?php echo $weatherData['weather'][0]['description']; ?></p>
                <p><strong>Temperature:</strong> <?php echo $weatherData['main']['temp']; ?>K</p>
                <p><strong>Feels Like:</strong> <?php echo $weatherData['main']['feels_like']; ?>K</p>
                <p><strong>Minimum Temperature:</strong> <?php echo $weatherData['main']['temp_min']; ?>K</p>
                <p><strong>Maximum Temperature:</strong> <?php echo $weatherData['main']['temp_max']; ?>K</p>
                <p><strong>Pressure:</strong> <?php echo $weatherData['main']['pressure']; ?> hPa</p>
                <p><strong>Humidity:</strong> <?php echo $weatherData['main']['humidity']; ?>%</p>
                <p><strong>Visibility:</strong> <?php echo $weatherData['visibility']; ?> meters</p>
                <p><strong>Wind Speed:</strong> <?php echo $weatherData['wind']['speed']; ?> m/s</p>
                <p><strong>Wind Direction:</strong> <?php echo $weatherData['wind']['deg']; ?>°</p>
                <p><strong>Cloudiness:</strong> <?php echo $weatherData['clouds']['all']; ?>%</p>
                <p><strong>Sunrise:</strong> <?php echo date('H:i:s', $weatherData['sys']['sunrise']); ?></p>
                <p><strong>Sunset:</strong> <?php echo date('H:i:s', $weatherData['sys']['sunset']); ?></p>
            </div>

            <br /><br />
            <a href="/weather">Go to Weather page...</a>
        </div>
    </body>
</html>
