<?php
/**
 * Copyright (c) 2014 S. A.
 */
namespace Eu\Mydevlab\TumblrExportImport\Core;

use OAuth\Common\Consumer\Credentials;
use OAuth\Common\Http\Uri\UriFactory;
use OAuth\Common\Http\Uri\UriInterface;
use OAuth\Common\Service\ServiceInterface;
use OAuth\Common\Storage\Session;
use OAuth\Common\Storage\TokenStorageInterface;
use OAuth\ServiceFactory;
use Slim\Slim;
use Symfony\Component\Yaml\Yaml;

/**
 * Class Application
 *
 * @package Eu\Mydevlab\TumblrExportImport\Core
 * @author Sylvain Artois <sylvain.artois@gmail.com>
 */
class Application
{
    /** @var array */
    protected $config = array();
    /** @var Slim */
    protected $slim;
    /** @var TokenStorageInterface */
    protected $storage;
    /** @var string */
    protected $rootDir;

    /**
     * @param Slim   $app
     * @param string $rootDir
     */
    public function __construct(Slim $app, $rootDir)
    {
        $this->slim     = $app;
        $this->rootDir  = $rootDir;
    }

    /**
     * @return Slim
     */
    public function getSlim()
    {
        return $this->slim;
    }

    /**
     * @param string $callbackUri
     * @return Credentials
     * @throws \DomainException
     */
    public function getCredentials($callbackUri)
    {
        if (empty($this->config)) {
            $this->loadConfigFile($this->rootDir);
        }

        return new Credentials(
            $this->config["root"]["tumblr_key"],
            $this->config["root"]["secret_key"],
            $callbackUri
        );
    }

    /**
     * @param array $server
     * @return UriInterface
     */
    public function getUri(array $server)
    {
        $uriFactory = new UriFactory();
        return $uriFactory->createFromSuperGlobalArray($server);
    }

    /**
     * @return TokenStorageInterface
     */
    public function getStorage()
    {
        if (is_null($this->storage)) {
            $this->storage = new Session();
        }

        return $this->storage;
    }

    /**
     * @param string $callbackUrl
     * @param string $service
     * @return ServiceInterface
     */
    public function getOauthService($callbackUrl, $service = "tumblr")
    {
        $serviceFactory = new ServiceFactory();
        return $serviceFactory->createService(
            $service,
            $this->getCredentials($callbackUrl),
            $this->getStorage()
        );
    }

    /**
     * @param string $url
     */
    public function redirect($url)
    {
        $this->slim->response->redirect($url);
    }

    /**
     * @param string $rootDir
     * @return array
     * @throws \DomainException
     */
    protected function loadConfigFile($rootDir)
    {
        if (! file_exists($configPath = $rootDir . "/../app/config/parameters.yml")) {
            throw new \DomainException("Missing config file $configPath");
        }

        $config = Yaml::parse($configPath);

        if (isset($config["root"]["tumblr_key"])
            || ! isset($config["root"]["secret_key"])
        ) {
            throw new \DomainException("Invalid config file");
        }

        return $this->config = $config;
    }
}
 