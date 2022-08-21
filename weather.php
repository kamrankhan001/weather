<?php

    require_once "current-location.php";

    $url = "https://api.openweathermap.org/data/2.5/weather?lat={$latitude}&lon={$longitude}&appid=bd96ad2595aa38e025f005bc84003374";
    
    function check_weather($url){
        $ch = curl_init();
        curl_setopt_array($ch,[
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
        ]);
        $result = curl_exec($ch);
        curl_close($ch);
    
        return json_decode($result, true);
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['check'])){
            $city = ucfirst($_POST['city']);
            $url =  "https://api.openweathermap.org/data/2.5/weather?q={$city}&appid=bd96ad2595aa38e025f005bc84003374";
            $result = check_weather($url);
        }
    }

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        $result = check_weather($url);
    }
