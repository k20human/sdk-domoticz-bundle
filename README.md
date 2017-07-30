Documentation
=============

#### Installation

with composer 

````
$ composer require dodev34/sdk-domoticz-bundle
````

#### Configuration

in you AppKernel file ````app/AppKenel.php````

````
public function registerBundles()
{
    $bundles = [
        // ...
        new M12U\Bundle\Sdk\DomoticzBundle\M12USdkDomoticzBundle(),
        // ...
    ];
    
    // ...
}
````

in your config file ````app/config/config.yml````

````
m12_u_sdk_domoticz:
    username: YOU_USERNAME
    password: YOU_PASSWORD
    base_uri: http://<you ip domoticz address>:8080
````

#### Note :
Make sure you have entered a username and password in your Domoticz application

#### Services

| Client name    | Method              | Doc  |
| -------------- |---------------------| -----|
| command        | getSunRiseSet       | Get sunrise and sunset times |
| command        | addLogMessage       | Add a log message to the Domoticz log |
| command        | getLightSwitches    | Get all lights/switches |
| command        | switchLight         |  |
| command        | setColbrightnessValue    |  |
| device         | getDevices            | Return list of device(s) |

exemple with log message command

````
$provider = $container->get('m12u.sdk.domoticz.provider_proxy');
$command = $provider->getClient('command');

$result = $command->addLogMessage("you message here");
// result {"status":"OK","title":"AddLogMessage"}
````

![AddLogMessage](Resources/public/cap-01.png?raw=true "AddLogMessage")

todo: Finish creating the proxy for the rest of the api endpoints
official doc for domiticz : https://www.domoticz.com/wiki/Domoticz_API/JSON_URL%27s