<?php
    if(empty($_GET["old_currency"])){
        exit();
    }

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL,"https://cdn.jsdelivr.net/npm/@fawazahmed0/currency-api@latest/v1/currencies/". urlencode($_GET["old_currency"]) .".json");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
    $result = curl_exec($curl) or die("Error: ".curl_error($curl));
    curl_close($curl);
    echo $result;
    exit();
?>
