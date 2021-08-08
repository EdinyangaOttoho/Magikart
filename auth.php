<?php
@session_start();
include("./task.php");
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/dotenv-loader.php';
include("./connect.php");

$auth0 = new Auth0\SDK\Auth0([
    'domain' => $_ENV['AUTH0_DOMAIN'],
    'client_id' => $_ENV['AUTH0_CLIENT_ID'],
    'client_secret' => $_ENV['AUTH0_CLIENT_SECRET'],
    'redirect_uri' => $_ENV['AUTH0_CALLBACK_URL'],
]);

$user = (object) $auth0->getUser();

$user_account = (object) [
    "username"=>$user->nickname,
    "email"=>$user->name,
    "profile_picture"=>$user->picture
];
$_SESSION["user"] = encrypt(json_encode($user_account));
header("location:./dashboard/");
?>