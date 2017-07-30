<?php

namespace M12U\Bundle\Sdk\DomoticzBundle\Client;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Promise\PromiseInterface;
use M12U\Bundle\Sdk\DomoticzBundle\Provider\TokenProviderInterface;
use M12U\Bundle\Sdk\DomoticzBundle\Exception\DomoticzException;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UriInterface;

/**
 * Class DomoticzClient
 * @package M12U\Bundle\Sdk\DomoticzBundle\Client
 */
class DomoticzClient implements ClientInterface
{
    /**
     * @var mixed
     */
    protected $client;

    /**
     * @var TokenProviderInterface
     */
    protected $tokenProvider;

    /**
     * @param $client
     */
    public function setClient($client)
    {
        $this->client = $client;
    }
    /**
     * @return mixed
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @inheritdoc
     */
    public function getTokenProvider()
    {
        return $this->tokenProvider;
    }

    /**
     * @inheritdoc
     */
    public function setTokenProvider(TokenProviderInterface $tokenProvider)
    {
        $this->tokenProvider = $tokenProvider;
        return $this;
    }

    /**
     * Create and send an HTTP request.
     *
     * Use an absolute path to override the base path of the client, or a
     * relative path to append to the base path of the client. The URL can
     * contain the query string as well.
     *
     * @param string $method HTTP method.
     * @param string|UriInterface $uri URI object or string.
     * @param array $options Request options to apply.
     *
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function request($method, $uri, array $options = [])
    {
        $options = array_merge(
            ['headers' => ['Authorization' => "Basic ".$this->tokenProvider->getCredentials()]],
            $options
        );
        try {
            $response = $this->getClient()->request(
                $method,
                $uri,
                $options
            );
            return $response;
        } catch (\Exception $e) {
            throw new DomoticzException($e->getMessage(), $e->getCode(), $e);
        }
    }

    /**
     * Send an HTTP request.
     *
     * @param RequestInterface $request Request to send
     * @param array $options Request options to apply to the given
     *                                  request and to the transfer.
     *
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function send(RequestInterface $request, array $options = [])
    {
        throw new DomoticzException("Method not implemented");
    }

    /**
     * Asynchronously send an HTTP request.
     *
     * @param RequestInterface $request Request to send
     * @param array $options Request options to apply to the given
     *                                  request and to the transfer.
     *
     * @return PromiseInterface
     */
    public function sendAsync(RequestInterface $request, array $options = [])
    {
        throw new DomoticzException("Method not implemented");
    }

    /**
     * Create and send an asynchronous HTTP request.
     *
     * Use an absolute path to override the base path of the client, or a
     * relative path to append to the base path of the client. The URL can
     * contain the query string as well. Use an array to provide a URL
     * template and additional variables to use in the URL template expansion.
     *
     * @param string $method HTTP method
     * @param string|UriInterface $uri URI object or string.
     * @param array $options Request options to apply.
     *
     * @return PromiseInterface
     */
    public function requestAsync($method, $uri, array $options = [])
    {
        throw new DomoticzException("Method not implemented");
    }

    /**
     * Get a client configuration option.
     *
     * These options include default request options of the client, a "handler"
     * (if utilized by the concrete client), and a "base_uri" if utilized by
     * the concrete client.
     *
     * @param string|null $option The config option to retrieve.
     *
     * @return mixed
     */
    public function getConfig($option = null)
    {
        throw new DomoticzException("Method not implemented");
    }
}