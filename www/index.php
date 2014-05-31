<?php
/**
 * Tumblr Export Import entry point
 *
 * @author S. Artois
 */
//index.php

require_once __DIR__ . "/../vendor/autoload.php";

if (!file_exists($configPath = __DIR__ . "/../app/config/parameters.yml")) {
    throw new \DomainException("Missing config file $configPath");
}

$config = \Symfony\Component\Yaml\Yaml::parse($configPath);
$tumblr_key = $config["root"]["tumblr_key"];
$secret_key = $config["root"]["secret_key"];

$app = new \Slim\Slim(array(
    "debug"          => true,
    "templates.path" => __DIR__ . "/../app/view"
));

$uriFactory = new \OAuth\Common\Http\Uri\UriFactory();
$currentUri = $uriFactory->createFromSuperGlobalArray($_SERVER);
$currentUri->setQuery('');

$servicesCredentials = array(
    'tumblr' => array(
        'key' => $tumblr_key,
        'secret' => $secret_key,
    )
);

/** @var $serviceFactory \OAuth\ServiceFactory An OAuth service factory. */
$serviceFactory = new \OAuth\ServiceFactory();

//Home page
$app->get('/', function () use ($app) {

    $app->render('home.php', array(
        'route' => $app->urlFor('auth-tumblr')
    ));
});

//Redirect to Tumblr for OAuth auth
$app
    ->get('/auth/tumblr', function () use ($app, $servicesCredentials, $currentUri, $serviceFactory) {

        // We need to use a persistent storage to save the token, because oauth1 requires the token secret received before'
        // the redirect (request token request) in the access token request.
        $storage = new OAuth\Common\Storage\Session();

        // Setup the credentials for the requests
        $credentials = new OAuth\Common\Consumer\Credentials(
            $servicesCredentials['tumblr']['key'],
            $servicesCredentials['tumblr']['secret'],
            $app->urlFor("authenticated")
        );

        // Instantiate the tumblr service using the credentials, http client and storage mechanism for the token
        $tumblrService = $serviceFactory->createService('tumblr', $credentials, $storage);

        // extra request needed for oauth1 to request a request token :-)
        $token = $tumblrService->requestRequestToken();

        $url = $tumblrService->getAuthorizationUri(
            array(
                'oauth_token' => $token->getRequestToken()
            )
        );

        $app->response->redirect($url);
    })
    ->name('auth-tumblr');


//OAuth callback after Tumblr auth
$app
    ->get('/authenticated', function () use ($app, $servicesCredentials, $currentUri, $serviceFactory) {

        $storage = new OAuth\Common\Storage\Session();
        $token   = $storage->retrieveAccessToken('Tumblr');
        $credentials = new OAuth\Common\Consumer\Credentials(
            $servicesCredentials['tumblr']['key'],
            $servicesCredentials['tumblr']['secret'],
            $app->urlFor("authenticated")
        );

        $tumblrService = $serviceFactory->createService('tumblr', $credentials, $storage);

        // This was a callback request from tumblr, get the token
        $tumblrService->requestAccessToken(
            $_GET['oauth_token'],
            $_GET['oauth_verifier'],
            $token->getRequestTokenSecret()
        );

        // Send a request now that we have access token
        $result = json_decode($tumblrService->request('user/info'));

        echo 'result: <pre>' . print_r($result, true) . '</pre>';
    })
    ->name('authenticated');

$app->run();

