<?php
session_start();
require '../Facebook/autoload.php';
$fb = new Facebook\Facebook([
  'app_id' => '1198700676969478', // Replace {app-id} with your app id
  'app_secret' => '6a8c28d7668418c20112c4ee9d50ac6a',
  'default_graph_version' => 'v4.0',
  ]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('https://mindcastr.blue-developments.net/db/fb/module/callback.php', $permissions);

header('Location: '.$loginUrl);


