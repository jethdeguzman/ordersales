

<?php 

function curl_load($url){
    curl_setopt($ch=curl_init(), CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
}

$url = "http://localhost:3000";


$curl =  curl_load($url);

//echo json_encode($curl);
echo $curl;
//echo "<meta http-equiv=\"refresh\" content=\"1\">";

?>


