<?php
/**
 * Tumblr Export Import entry point
 *
 * @author S. Artois
 */
//index.php

require_once __DIR__ . "/../vendor/autoload.php";

$app = new \Slim\Slim(array(
    "debug"          => true,
    "templates.path" => __DIR__ . "/../app/view"
));

$application = new \Eu\Mydevlab\TumblrExportImport\Core\Application($app, __DIR__);

//Home page
$app->get('/', function () use ($app) {

    $app->render('home.php', array(
        'route' => $app->urlFor('auth-tumblr')
    ));
});

//Redirect to Tumblr for OAuth auth
$app
    ->get('/auth/tumblr', function () use ($application) {

        $tumblrService  = $application->getOauthService(
            $application->getSlim()->urlFor("authenticated")
        );

        $token          = $tumblrService->requestRequestToken();

        $application->redirect(
            $tumblrService->getAuthorizationUri(
                array(
                    'oauth_token' => $token->getRequestToken()
                )
            )
        );
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

