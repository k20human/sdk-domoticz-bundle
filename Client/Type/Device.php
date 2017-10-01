<?php

namespace M12U\Bundle\Sdk\DomoticzBundle\Client\Type;

use M12U\Bundle\Sdk\DomoticzBundle\Client\DomoticzClient;

/**
 * Class Device
 * @package M12U\Bundle\Sdk\DomoticzBundle\Client\Type
 */
class Device extends DomoticzClient
{
    /**
     * @param array $query
     * @return string
     */
    public function getDevices(array $query = [])
    {
        $query = array_merge(['type' => 'devices'], $query);
        $response = $this->request('GET', '/json.htm', ['query' => $query]);
        return (string) $response->getBody()->getContents();
    }

    /**
     * @param int $idx
     * @return string
     */
    public function getDevice($idx)
    {
        $query = array_merge(['type' => 'devices'], ['rid' => $idx]);
        $response = $this->request('GET', '/json.htm', ['query' => $query]);
        return (string) $response->getBody()->getContents();
    }
}