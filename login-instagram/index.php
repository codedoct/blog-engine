<?php
require 'vendor/autoload.php';
//--->gimana caranya???//https://www.instagram.com/oauth/authorize/?client_id=6d846edb34f24661837073c60d7e60c9&redirect_uri=http://localhost/test/test-instagram&response_type=code
//--->terminal//curl -F 'client_id=6d846edb34f24661837073c60d7e60c9' -F 'client_secret=80e55652fa474621abd2c65358166969' -F 'grant_type=authorization_code' -F 'redirect_uri=http://localhost/test/test-instagram' -F 'code=5c06492e0f0a4d299bfab5cd12a790cc' https://api.instagram.com/oauth/access_token
//--->get access token//https://www.instagram.com/oauth/authorize/?client_id=6d846edb34f24661837073c60d7e60c9&amp;redirect_uri=http://localhost/test/test-instagram&amp;response_type=token
//--->login to instagram luvireal//https://www.instagram.com/oauth/authorize/?client_id=6d846edb34f24661837073c60d7e60c9&redirect_uri=http://localhost/buzz/public/api/login/instagram&response_type=code
//--->get profile//https://api.instagram.com/v1/users/4350914388/?access_token=4350914388.6d846ed.8477a4d484824daf8f792b7419c2bb1a

$code  = $_GET["code"] ? $_GET["code"] : null;

// $fields = array(
//        'client_id' => '6d846edb34f24661837073c60d7e60c9',
//        'client_secret' => '80e55652fa474621abd2c65358166969',
//        'grant_type' => 'authorization_code',
//        'redirect_uri' => 'http://localhost/test/test-instagram',
//        'code' => $code
// );
// $url = 'https://api.instagram.com/oauth/access_token';
// $ch = curl_init();
// curl_setopt($ch, CURLOPT_URL, $url);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// curl_setopt($ch, CURLOPT_TIMEOUT, 20);
// curl_setopt($ch,CURLOPT_POST,true); 
// curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
// $result = curl_exec($ch);
// curl_close($ch); 
// $result = json_decode($result);
// var_dump($result);


// $response = get_web_page("http://localhost/buzz/public/api/admin/withdraw");
// $response = get_web_page("http://www.codedoct.com");
// $resArr = array();
// $resArr = json_decode($response);
// echo "<pre>"; print_r($resArr); echo "</pre>";

// function get_web_page($url) {
//     $options = array(
//         CURLOPT_RETURNTRANSFER => true,   // return web page
//         CURLOPT_HEADER         => false,  // don't return headers
//         CURLOPT_FOLLOWLOCATION => true,   // follow redirects
//         CURLOPT_MAXREDIRS      => 10,     // stop after 10 redirects
//         CURLOPT_ENCODING       => "",     // handle compressed
//         CURLOPT_USERAGENT      => "test", // name of client
//         CURLOPT_AUTOREFERER    => true,   // set referrer on redirect
//         CURLOPT_CONNECTTIMEOUT => 120,    // time-out on connect
//         CURLOPT_TIMEOUT        => 120,    // time-out on response
//     ); 

//     $ch = curl_init($url);
//     curl_setopt_array($ch, $options);

//     $content  = curl_exec($ch);

//     curl_close($ch);

//     return $content;
// }

$client = new \GuzzleHttp\Client(['verify' => false]);

try {
    $res = $client->request("POST", "https://api.instagram.com/oauth/access_token", [
        'form_params' => [
            'client_id' => '6d846edb34f24661837073c60d7e60c9',
            'client_secret' => '80e55652fa474621abd2c65358166969',
            'grant_type' => 'authorization_code',
            'redirect_uri' => 'http://localhost/test/test-instagram',
            'code' => $code
        ]
    ]);
} catch (ClientException $e) {
    customException([
        "status" => $this::ERROR_LOGIN_INSTAGRAM,
        "messages" => $e->getMessage(),
    ]);
}

/** @var ResponseInterface $res */
$resultArray = json_decode($res->getBody()->getContents());

$userInstagram = $resultArray;
var_dump($userInstagram);































// $code  = $_GET["code"] ? $_GET["code"] : null;
// // print_r('test');
// if ($code) {

// 	// $post = [
//  //        'client_id' => '6d846edb34f24661837073c60d7e60c9',
//  //        'client_secret' => '80e55652fa474621abd2c65358166969',
//  //        'grant_type' => 'authorization_code',
//  //        'redirect_uri' => 'http://localhost/test/test-instagram',
//  //        'code' => $code
// 	// ];

// 	// $ch = curl_init('https://api.instagram.com/oauth/access_token');
// 	// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// 	// // curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

// 	// // execute!
// 	// $server_output = curl_exec($ch);

// 	// // close the connection, release resources used
// 	// curl_close($ch);

// 	// if ($server_output) { 
// 	// 	echo '<pre>';
// 	//     if ( is_array( $server_output ) )  {
// 	//         $result = array($server_output);
// 	//     } else {
// 	//         var_dump ($test);
// 	//     }
// 	//     echo '</pre>';
// 	// } else {
// 	// 	echo "ERROR";
// 	// 	echo "<br>";
// 	// }

// 	// $result = array(
// 	// 	'code' => $code,
// 	// );
// 	// foreach ($result as $key => $value) {
// 	// 	echo $key.' : '.$value;
// 	// }


// 	// $ch = curl_init('https://api.instagram.com/oauth/access_token');
// 	$ch = curl_init('http://stackoverflow.com/questions/2596802/curl-automatically-display-the-result');

// 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// 	curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

// 	// execute!
// 	$response = curl_exec($ch);

// 	// close the connection, release resources used
// 	curl_close($ch);

// 	// do anything you want with your response
// 	// var_dump($response);
// 	// print_r($response);
// 	$parsed = array();
// 	parse_str($response, $parsed);
// 	print_r($parsed);

// } else {
// 	echo 'Not Login';
// }

?>