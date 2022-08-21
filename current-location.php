<?php

    $ch = curl_init();
    curl_setopt_array($ch,[
        CURLOPT_URL => "https://api.ipfind.com/me?auth=d6665932-cf31-4ec6-9de4-9475d912d345",
        CURLOPT_RETURNTRANSFER => true,
    ]);
    $result = curl_exec($ch);
    curl_close($ch);

    $result = json_decode($result, true);
    $longitude = $result['longitude'];
    $latitude = $result['latitude'];