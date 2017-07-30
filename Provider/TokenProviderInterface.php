<?php

namespace M12U\Bundle\Sdk\DomoticzBundle\Provider;

interface TokenProviderInterface
{
    /**
     * @return string username:password encoded on base 64
     */
    public function getCredentials();
}