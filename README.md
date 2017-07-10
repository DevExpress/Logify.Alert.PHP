# Logify Alert for PHP applications
A PHP client to report exceptions to [Logify Alert](https://logify.devexpress.com).

## Install 
install php client TO DO

## Quick Start
### Automatic error reporting
```php 5
    require_once('/LogifyAlertClient.php');
    
    $client = LogifyAlertClient::get_instance();
    $client->apiKey = 'SPECIFY_YOUR_API_KEY_HERE';
    $client->set_handlers();
```

### Manual error reporting
```php 5
    require_once('/LogifyAlertClient.php');
    
    try {
        $client = LogifyAlertClient::get_instance();
        $client->apiKey = 'SPECIFY_YOUR_API_KEY_HERE';
    }
    catch (Exception $e) {
        $client->send($e);
    }
```

## Configuration
You can set up the Logify Alert client using the **Config.php** file as follows.
```php 5
<?php
    class LogifyAlert{
	const serviceUrl = 'http://logify.devexpress.com/api/report/newreport';
	const apiKey = 'SPECIFY_YOUR_API_KEY_HERE';
        const userId = 'php user';
        const appName = 'My Application';
        const appVersion = '1.0.2';

        public $globalVariablesPermissions = array(
            'get' => true,
            'post' => true,
            'cookie' => true,
            'files' => true,
            'enviroment' => true,
            'request' => true,
            'server' => true,
        );
    }
?>
```

## API
### Properties
#### ApiKey
String. Specifies an [API Key](https://logify.devexpress.com/Documentation/CreateApp) used to register the applications within the Logify service.
```php
$client->apiKey = 'My Api Key';
```

#### AppName
String. Specifies the application name.
```php
$client->appName = 'My Application';
```
#### AppVersion
String. Specifies the application version.
```php
$client->appVersion = '1.0.2';
```

