<?php

namespace M12U\Bundle\Sdk\DomoticzBundle\Client\Type;

use M12U\Bundle\Sdk\DomoticzBundle\Client\DomoticzClient;

/**
 * Class Command
 * @package M12U\Bundle\Sdk\DomoticzBundle\Client\Type
 */
class Command extends DomoticzClient
{
    const SWITCH_ON = 'On';
    const SWITCH_OFF = 'Off';
    const SWITCH_TOGGLE = 'Toggle';

    /**
     * Get sunrise and sunset times
     *
     * @return string
     */
    public function getSunRiseSet()
    {
        $query = ['type' => 'command', 'param' => 'getSunRiseSet'];
        $response = $this->request('GET', '/json.htm', ['query' => $query]);
        return (string) $response->getBody()->getContents();
    }

    /**
     * Add a log message to the Domoticz log
     *
     * @param string $message
     * @return string
     */
    public function addLogMessage($message)
    {
        $query = ['type' => 'command', 'param' => 'addlogmessage', 'message' => $message];
        $response = $this->request('GET', '/json.htm', ['query' => $query]);
        return (string) $response->getBody()->getContents();
    }

    /**
     * Get all lights/switches
     *
     * @return string
     */
    public function getLightSwitches()
    {
        $query = ['type' => 'command', 'param' => 'getlightswitches'];
        $response = $this->request('GET', '/json.htm', ['query' => $query]);
        return (string) $response->getBody()->getContents();
    }

    /**
     * /json.htm?type=command&param=switchlight&idx=99&switchcmd=On
     * /json.htm?type=command&param=switchlight&idx=99&switchcmd=Off
     * /json.htm?type=command&param=switchlight&idx=99&switchcmd=Toggle
     * /json.htm?type=command&param=switchlight&idx=99&switchcmd=Set%20Level&level=6
     *
     * @param int $idx
     * @param string $switchcmd On|Off
     * @return string
     */
    public function switchLight($idx, $switchcmd, array $query = [])
    {
        $query = array_merge(
            ['type' => 'command', 'param' => 'switchlight'],
            ['idx' => $idx, 'switchcmd' => $switchcmd],
            $query
        );
        $response = $this->request('GET', '/json.htm', ['query' => $query]);
        return (string) $response->getBody()->getContents();
    }

    /**
     * Set an RGB(W) light to a certain color and brightness
     * /json.htm?type=command&param=setcolbrightnessvalue&idx=99&hue=274&brightness=40&iswhite=false
     *
     * @param array $query
     * @return string
     */
    public function setColbrightnessValue(array $query = [])
    {
        $query = array_merge(['type' => 'command'], $query);
        $response = $this->request('GET', '/json.htm', ['query' => $query]);
        return (string) $response->getBody()->getContents();
    }
}