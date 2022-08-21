<?php require_once "weather.php"; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="icon.png" type="image/x-icon">
    <title>Weather</title>
</head>
<body>
    <div id="card">
        <form action="" method="POST">
            <input type="text" name="city" id="city" placeholder="Enter City" autocomplete="off">
            <button type="submit" name="check">Check</button>
        </form>
        <?php if($result['cod'] == 200){ ?>
            <div id="weather">
                <div class="flex between">
                    <div>
                        <h1><?php echo $result['name'] ?></h1>
                        <h3>Temperature  <?php echo round($result['main']['temp']-273.15) ?> C</h3>
                    </div>
                    <div>
                        <img src="<?php echo "https://openweathermap.org/img/wn/{$result['weather'][0]['icon']}@2x.png" ?>" alt="pic" style="margin-top: -15px;">
                    </div>
                </div>
                <table style="margin-bottom: 10px;">
                    <thead>
                        <tr>
                            <th>wind Speed</th>
                            <th>Mian</th>
                            <th>Description</th>
                            <th>Pressure</th>
                            <th>Humidity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $result['wind']['speed'] ?> m/s</td>
                            <td><?php echo $result['weather'][0]['main'] ?></td>
                            <td><?php echo $result['weather'][0]['description'] ?></td>
                            <td><?php echo $result['main']['pressure'] ?> hPa</td>
                            <td><?php echo $result['main']['humidity'] ?>%</td>
                        </tr>
                    </tbody>
                </table>
                <div style="text-align: right">
                    <div class="date">
                        <?php echo date("d M",$result['dt']) ?>
                    </div>
                </div>
            </div>
        <?php }?>
        <?php echo $result['cod'] == 200 ? "": "<h1>City Not Found</h1>" ?>
    </div>
</body>
</html>
