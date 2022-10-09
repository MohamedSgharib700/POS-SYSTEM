<?php


//This is the main function of API integration

if (!function_exists('curlRequest')) {

    function curlRequest($url, $authToken = NULL, $method = 'get', $data = [])
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        if ($method == 'post') {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        }

        if ($authToken)
            curl_setopt($ch, CURLOPT_HTTPHEADER, ["Accept: application/json", "Authorization:Bearer {$authToken}"]);

        $server_output = curl_exec($ch);
        curl_close($ch);

        $result = json_decode($server_output);
        return $result ?? (object) ['success' => false, 'message' => 'no response'];
    }

    //end function
}