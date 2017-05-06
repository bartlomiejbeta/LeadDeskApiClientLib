# LeadDeskApiClientLib

This repository holds client library for lead-desk api. It used HTTPlug to make client more flexible

More info can be found on http://leaddesk.com/

#TODO
- add cache support
- add more lead desk api endpoints (feel free to PR)
- add tests

## Installing

Add Repository

```
"repositories": [
   {
       "type": "vcs",
       "url": "https://github.com/bartlomiejbeta/LeadDeskApiClientLib"
    }
]
```

Add package to composer

`composer require bartlomiejbeta/lead-desk-api-client-lib`

Require one of the following client implementations:

- php-http/guzzle6-adapter
- php-http/guzzle5-adapter
- php-http/curl-client
- php-http/socket-client
- php-http/react-adapter
- php-http/buzz-adapter
- php-http/zend-adapter
- php-http/cakephp-adapter

See all implementations: https://packagist.org/providers/php-http/client-implementation

For example:
`composer require php-http/curl-client`


## General Usage:
```php
$clientCredentials = new ClientCredentials($token);
$httpsClient       = HttpClientDiscovery::find();
$msg               = MessageFactoryDiscovery::find();
$stream            = StreamFactoryDiscovery::find();

$apiClient = new ApiClient($httpsClient, $clientCredentials, $msg, $stream);

/** apiClient can be used to send any lead desk api request. $request must be instace of Psr RequestInterface*/
$apiClient->sendRequest($request);
```

#LeadDeskApi Usage

```php
/** but also you can use implemented some of lead desk endpoints by using this */
$leadDeskApi = new LeadDeskApiClient($apiClient);

/** contact exists -> refere to lead desk api documentation */
$contactFilter       = new ContactFilter($phone, $listId);
$existRepresentation = $leadDeskApi->contactExists($contactFilter);// @see ExistsRepresentation

/** find contact -> refere to lead desk api documentation */
$contactFilter      = new ContactFilter($phone, $listId);
$findRepresentation = $leadDeskApi->findContact($contactFilter);// @see FindRepresentation

/** get contact -> refere to lead desk api documentation */
$contactIdFilter   = new ContactIdFilter($contactId);
$getRepresentation = $leadDeskApi->getContact($contactIdFilter);// @see GetRepresentation

/** delete contact -> refere to lead desk api documentation */
$contactIdFilter     = new ContactIdFilter($contactId);
$existRepresentation = $leadDeskApi->deleteContact($contactFilter);// @see ExistsRepresentation

/** create contact -> refere to lead desk api documentation */
$contactRepresentation = (new ContactRepresentation())
							->setPhone($phone)
							...;
							
$createRepresentation   = $leadDeskApi->createContact($contactRepresentation);// @see CreateRepresentation

```