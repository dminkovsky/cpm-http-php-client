# cURL HTTP Client

## Features

* Tiny, basic
* Fluent API


## Example

```php
// Load with Composer`
require 'vendor/autoload.php';
// Make `CurlClient` local
use Cpm\Http\CurlClient;

// To GET data:
$result = CurlClient::make()
  ->url('http://api.google.com/some/api')
  ->set('Custom-Header', 'Value')
  ->set('Another-Header', 'Something else')
  ->get()
  ->execute();

// To POST data:
$data = 'The lazy brown fox jumps';
$result = CurlClient::make()
  ->url('http://api.google.com/some/api')
  ->set('Custom-Header', 'Value')
  ->post($data)
  ->execute();  
```

`$result` contains an array with the `status` and `body`. `status` is an integer and `body` is a string.

Real example can be found in [`Cpm\Salesforce\Client`](https://github.com/dminkovsky/cpm-salesforce-sdk-php/blob/master/src/Cpm/Salesforce/Client.php#L174).
