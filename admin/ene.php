<?php

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("X-Api-Key:test_c7c615636b2e56c3b9fff7e573a",
                  "X-Auth-Token:test_ceaa10e9a0648fd8a1e57255623"));
$payload = Array(
    'purpose' => 'FIFA 16',
    'amount' => '2500',
    'phone' => '9999999999',
    'buyer_name' => 'Bhaskarjyoti Gogoi',
    'redirect_url' => 'https://spicytrivia.com/success.php',
    'send_email' => true,
    'webhook' => '',
    'send_sms' => true,
    'email' => 'bgogoi.user@gmail.com',
    'allow_repeated_payments' => false
);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
$response = curl_exec($ch);
curl_close($ch); 

echo $response;

?>