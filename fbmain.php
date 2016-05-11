<?php

date_default_timezone_set('UTC'); 

require('vendor/autoload.php');

use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequestException;
use Facebook\FacebookRequest;
use Facebook\HttpClients\FacebookGuzzleHttpClient;

// Set Facebook App ID, App Secret and Site URL
$_CONFIG = [
    'appid' => getenv('FB_APPID') ?: '',
    'secret' => getenv('FB_SECRET') ?: '',
    'site_url' => getenv('SITE_URL') ?: '',
    'max_width' => 390,
    'access_token_key_prefix' => 'fbat_'
];

$access_token_key = $_CONFIG['access_token_key_prefix'] . $_CONFIG['appid'];

session_start();

// Setup application
FacebookSession::setDefaultApplication($_CONFIG['appid'], $_CONFIG['secret']);
FacebookRequest::setHttpClientHandler(new FacebookGuzzleHttpClient());

// Get the helper
$helper = new FacebookRedirectLoginHelper($_CONFIG['site_url']);

// Attempt to retrieve a session
if (isset($_GET['code'])) {
    $session = $helper->getSessionFromRedirect();

    if (!is_null($session)) {
        $_SESSION[$access_token_key] = $session->getToken();
    }

    header('Location: ' . $_CONFIG['site_url']);
}
if (isset($_SESSION[$access_token_key])) {
    $session = new FacebookSession($_SESSION[$access_token_key]);

    try {
        $session->validate();
    } catch (FacebookSDKException $e) {
        $session = null;
    }
}

if (is_null($session)) {
    header('Location:' . $helper->getLoginUrl(['publish_actions']));
    exit;
}

$user_profile = (new FacebookRequest($session, 'GET', '/me'))->execute()->getGraphObject('Facebook\GraphUser')->asArray();

// Generate an aleatory code to obtain always pics with different names
function code($length) {
	$pattern = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
	$max= strlen($pattern) - 1;
    $key = '';
	for ($i=0; $i<$length; $i++) {
	  $key .= $pattern[rand(0,$max)];
    }
	return $key;
}

// Call to 'code' function with 10 aleatory characters
$code2 = code(10);

// Start the upload
if (isset($_POST['action']) && $_POST['action'] == "upload_fb_image") {
	if ($_POST['message'] == 'Add a description...'){
		$message = 'This photo was created with the Cool Profile application. You can purchase the App here: http://bit.ly/SJaBJt';
	}else{
		$message = $_POST['message'];
	}

	// Start the code to change the original image
	$res = json_decode(stripslashes($_POST['jsondata']), true);
	// Get data
	$count_images = count($res['images']);
	// The background image is the first one
	$background = $res['images'][0]['src'];
	$photo1	= imagecreatefromjpeg($_POST['photo']);
	$photo1W = imagesx($photo1);
	$photo1H = imagesy($photo1);
	$photoFrameW = $res['images'][0]['width'];
	$photoFrameH = $res['images'][0]['height'];
	$photoFrame = imagecreatetruecolor($photoFrameW,$photoFrameH);
	imagecopyresampled($photoFrame, $photo1, 0, 0, 0, 0, $photoFrameW, $photoFrameH, $photo1W, $photo1H);

	// The other images
	for($i = 1; $i < $count_images; ++$i){
		$insert = $res['images'][$i]['src'];
		$photoFrame2Rotation = (180-$res['images'][$i]['rotation']) + 180;
		$photo2 = imagecreatefrompng($insert);
		$photo2W = imagesx($photo2);
		$photo2H = imagesy($photo2);
		$photoFrame2W = $res['images'][$i]['width'];
		$photoFrame2H = $res['images'][$i]['height'];
		$photoFrame2TOP = $res['images'][$i]['top'];
		$photoFrame2LEFT= $res['images'][$i]['left'];
		$photoFrame2 = imagecreatetruecolor($photoFrame2W,$photoFrame2H);
		$trans_colour = imagecolorallocatealpha($photoFrame2, 0, 0, 0, 127);
		imagefill($photoFrame2, 0, 0, $trans_colour);
		imagecopyresampled($photoFrame2, $photo2, 0, 0, 0, 0, $photoFrame2W, $photoFrame2H, $photo2W, $photo2H);
		$photoFrame2 = imagerotate($photoFrame2,$photoFrame2Rotation, -1,0);
		// After rotating calculate the difference of new height/width with the one before
		$extraTop =(imagesy($photoFrame2)-$photoFrame2H)/2;
		$extraLeft =(imagesx($photoFrame2)-$photoFrame2W)/2;
		imagecopy($photoFrame, $photoFrame2,$photoFrame2LEFT-$extraLeft, $photoFrame2TOP-$extraTop, 0, 0, imagesx($photoFrame2), imagesy($photoFrame2));
	}

	// Save the new modificated picture in fb_images/
	imagejpeg($photoFrame, "fb_images/$code2.jpg");

	// The relative path to the file
	$file = realpath("fb_images/".$code2.".jpg");

    try {
        $response = (new FacebookRequest($session, 'POST', '/me/photos', [
            'source' => fopen($file, 'r'),
            'message' => $message
        ]))->execute();

        $success = 'true';
    } catch (FacebookRequestException $e) {
        $success = 'false';
    }

	unlink("fb_images/".$code2.".jpg");

	header("Location: index.php?res=$success");
}

// Function to download the image from facebook server to local server
function copy_remote_image($url, $cod, $m_width = 390 /*Default width*/){
	ini_set('max_execution_time', 600);
	$remote_file = $url;
	$local_file = "fb_images/".$cod."_fb_photo.jpg";

    try {
        $data = (new GuzzleHttp\Client())->get($remote_file)->getBody();
    } catch (GuzzleHttp\Exception\RequestException $e) {
        die("We cannot read the remote file");
    }

    file_put_contents($local_file, $data)
	or die("We cannot write in the local file");
	// Get the image size saved in the fb_images
	$dim = getimagesize($local_file);

	if ($dim[0] > $m_width){

		// Read the downloaded image
		$src = imagecreatefromjpeg($local_file);
		// Create the new image dimensions
		$newheight = ($dim[1]/$dim[0]) * $m_width;
		$newwidth = $m_width;

		$tmp=imagecreatetruecolor($newwidth,$newheight);
		imagealphablending($tmp, false);
		imagesavealpha($tmp,true);
		imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$dim[0],$dim[1]);
		// Write the resized image to disk
		imagejpeg($tmp,$local_file,100);

	}else{

		// Create an image with 'imagecreatetruecolor' function with the new width and height
		$new_image = imagecreatetruecolor($dim[0],$dim[1]);

		// We need the original image to merge the new image
		$original_image = imagecreatefromjpeg($local_file);
		// Create the merge between the new image and the original image
		imagecopy($new_image, $original_image, 0, 0, 0, 0, $dim[0], $dim[1]);
		// Save the merged image
		imagejpeg($new_image, $local_file);

	}
}
