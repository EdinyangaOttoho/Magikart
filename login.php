<?php
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/dotenv-loader.php';

$auth0 = new Auth0\SDK\Auth0([
    'domain' => $_ENV['AUTH0_DOMAIN'],
    'client_id' => $_ENV['AUTH0_CLIENT_ID'],
    'redirect_uri' => $_ENV['AUTH0_CALLBACK_URL'],
    'audience' => $_ENV['AUTH0_AUDIENCE'],
    'scope' => 'openid profile email'
]);

$auth0->login();
?>
<style>
    a[href="https://www.000webhost.com/?utm_source=000webhostapp&utm_campaign=000_logo&utm_medium=website&utm_content=footer_img"] {
		display:none;
	}
</style>