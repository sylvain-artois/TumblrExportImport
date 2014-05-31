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
    ->get('/authenticated', function () use ($application) {

        $token          = $application->getTokenFromStorage();
        $tumblrService  = $application->getOauthService(
            $application->getSlim()->urlFor("authenticated")
        );

        $tumblrService->requestAccessToken(
            $application->getSlim()->request->get("oauth_token"),
            $application->getSlim()->request->get("oauth_verifier"),
            $token->getRequestTokenSecret()
        );

        $result = json_decode($tumblrService->request('user/info'));

        $application->getSlim()->render(
            'authenticated.php',
            array(
                'data' => $result
            )
        );
    })
    ->name('authenticated');

$app->run();

