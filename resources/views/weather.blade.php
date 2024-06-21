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
                max-width: 600px;
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
            form {
                margin-top: 20px;
            }
            label {
                display: block;
                margin: 10px 0 5px;
            }
            input[type="text"] {
                width: 100%;
                padding: 10px;
                margin-bottom: 20px;
                border: 1px solid #ccc;
                border-radius: 4px;
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
            .image-container {
                text-align: center;
                margin-bottom: 20px;
            }
            .image-container img {
                max-width: 100%;
                height: auto;
            }
            .instructions {
                margin-bottom: 20px;
                font-size: 1.2em;
                color: #666;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="image-container">
                <img src="{{ asset('images/photo_1.jpg') }}" alt="PHP Weather App">
            </div>
            <h1>PHP Weather App</h1>
            <p class="instructions">Please enter the longitude and latitude for the place where you would like to check the weather.</p>
            <form action="resultWeather">
                <label for="lon">Longitude:</label>
                <input type="text" id="lon" name="lon" pattern="-?\d+(\.\d+)?" title="Please enter a valid longitude">
                <label for="lat">Latitude:</label>
                <input type="text" id="lat" name="lat" pattern="-?\d+(\.\d+)?" title="Please enter a valid latitude">
                <button type="submit">Check Weather</button>
            </form>
        </div>
    </body>
</html>
