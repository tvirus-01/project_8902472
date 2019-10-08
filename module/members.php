<?php
session_start();
require '../Facebook/autoload.php';
$fb = new Facebook\Facebook([
  'app_id' => '1198700676969478', // Replace {app-id} with your app id
  'app_secret' => '6a8c28d7668418c20112c4ee9d50ac6a',
  'default_graph_version' => 'v4.0',
  ]);

try {
  // Returns a `Facebook\FacebookResponse` object
  $response = $fb->get('/me?fields=id,name,email,link,gender', $_SESSION['fb_access_token']);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

$user = $response->getGraphUser();

//echo 'Name: ' . $user['name'];

print($user);

echo '<a href="scrape.php">click here</a> to scrape';