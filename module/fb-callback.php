<?php
session_start();
require '../Facebook/autoload.php';
$fb = new Facebook\Facebook([
  'app_id' => '1198700676969478', // Replace {app-id} with your app id
  'app_secret' => '6a8c28d7668418c20112c4ee9d50ac6a',
  'default_graph_version' => 'v4.0',
  ]);

$helper = $fb->getRedirectLoginHelper();

try {
  $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

if (! isset($accessToken)) {
  if ($helper->getError()) {
    header('HTTP/1.0 401 Unauthorized');
    echo "Error: " . $helper->getError() . "\n";
    echo "Error Code: " . $helper->getErrorCode() . "\n";
    echo "Error Reason: " . $helper->getErrorReason() . "\n";
    echo "Error Description: " . $helper->getErrorDescription() . "\n";
  } else {
    header('HTTP/1.0 400 Bad Request');
    echo 'Bad request';
  }
  exit;
}
echo '<h3>Access Token Generated</h3>';
$_SESSION['access_tkn'] = $accessToken->getValue();
//echo $_SESSION['access_tkn'];

echo '<a href="profile.php">click here</a> to view profile info';