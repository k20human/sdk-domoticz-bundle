<?php

namespace M12U\Bundle\Sdk\DomoticzBundle\Provider;

use M12U\Bundle\Sdk\DomoticzBundle\DependencyInjection\Compiler\ProxyChain;

use InvalidArgumentException;

/**
 * Class ProxyProvider
 * @package M12U\Bundle\Sdk\DomoticzBundle\Provider
 */
class ProxyProvider
{
    /**
     * @var ProxyChain
     */
    protected $chain;

    /**
     * ProxyChain constructor.
     * @param ProxyChain $proxyChain
     */
    public function __construct(ProxyChain $proxyChain)
    {
        $this->chain = $proxyChain;
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function getClient($name)
    {
        if (!$proxy = $this->chain->getProxy($name)) {
            throw new InvalidArgumentException(sprintf(
                "Client proxy '%s' doesn't exist.", $name));
        }

        return $proxy;
    }
}