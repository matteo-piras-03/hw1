<?php
    session_start();

    if(empty($_POST["query"])){
        exit();
    }

    $client_id = "id";
    $client_secret = "secret";
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL,"https://api.sandbox.ebay.com/identity/v1/oauth2/token");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, "grant_type=client_credentials&scope=https://api.ebay.com/oauth/api_scope");
    $headers = array("Authorization: Basic ". base64_encode($client_id.":".$client_secret),
                    "Content-Type: application/x-www-form-urlencoded");
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    $token = curl_exec($curl) or die("Error: ".curl_error($curl));

    $token = json_decode($token);
    $token = $token->access_token;
    $search_query = $_POST["query"];
    $search_value = urlencode($search_query);
    $data = http_build_query(array(
        "q" => $search_value,
        "limit" => 15
    ));

    curl_setopt($curl, CURLOPT_URL,"https://api.sandbox.ebay.com/buy/browse/v1/item_summary/search?".$data);
    $headers = array("Authorization: Bearer ".$token,
                    "Content-Type: application/json",
                    "X-EBAY-C-MARKETPLACE-ID: EBAY_US");
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_POST, 0);
    $result = curl_exec($curl) or die("Error: ".curl_error($curl));
    
    curl_close($curl);
    echo $result;
?>
