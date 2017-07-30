<?php

namespace M12U\Bundle\Sdk\DomoticzBundle\Provider;

/**
 * Class TokenProvider
 * @package M12U\Bundle\Sdk\Sierra\IotM2MBundle\Provider
 */
class TokenProvider implements TokenProviderInterface
{
    /**
     * @var string
     */
    protected $username;

    /**
     * @var string
     */
    protected $password;

    /**
     * TokenProvider constructor.
     * @param string $username
     * @param string $password
     */
    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }
    /**
     * @return string
     */
    public function getCredentials()
    {
        return (string)base64_encode(sprintf('%s:%s', $this->username, $this->password));
    }
}