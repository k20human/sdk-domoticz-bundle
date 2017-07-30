<?php

namespace M12U\Bundle\Sdk\DomoticzBundle\Client;

use GuzzleHttp\ClientInterface as GuzzleHttpClientInterface;
use M12U\Bundle\Sdk\DomoticzBundle\Provider\TokenProviderInterface;

/**
 * Interface ClientInterface
 * @package M12U\Bundle\Sdk\DomoticzBundle\Client
 */
interface ClientInterface extends GuzzleHttpClientInterface
{
    /**
     * @param $client
     */
    public function setClient($client);
    /**
     * @return mixed
     */
    public function getClient();

    /**
     * @return TokenProviderInterface
     */
    public function getTokenProvider();
    /**
     * @param TokenProviderInterface $tokenProvider
     */
    public function setTokenProvider(TokenProviderInterface $tokenProvider);
}