# cURL HTTP Client

## Features

* Tiny, basic
* Fluent API


## Example

Concrete example can be found in [`Cpm\Salesforce\Client`](https://github.com/dminkovsky/cpm-salesforce-sdk-php/blob/master/src/Cpm/Salesforce/Client.php#L240)

Simple example:

```php

// Load things with Composer. Alternatively, can be loaded manually.
require 'vendor/autoload.php';

use Cpm\HttpClient 


// GET data
$result = HttpClient::make()
  ->url('http://api.google.com/some/api')
  ->set('Custom-Header', 'Value')
  ->set('Another-Header', 'Something else')
  ->get()
  ->execute();


// POST data
$data = 'The lazy brown fox jumps';
$result = HttpClient::make()
  ->url('http://api.google.com/some/api')
  ->set('Custom-Header', 'Value')
  ->post($data, true);  // `true` as the second parameter to `get()` or `post()` executes the request.
```
