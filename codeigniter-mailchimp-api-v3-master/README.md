# CodeIgniter Mailchimp API v3 REST Client
A simple REST client for CodeIgniter for interacting with v3 of the MailChimp API.

## Requirements
1. PHP 5.4+
2. CodeIgniter 3.0+

## Installation
Drag and drop the **libraries/Mailchimp.php** and **config/mailchimp.php** files into your application's directories.

Enter your API key in the **config/mailchimp.php** config file

## Making a Request
Making a request is simple. You can make a request to any of the Endpoints supported by v3 of the MailChimp API. Simply pass the request type (GET,POST,PATCH,DELETE) and the Endpoint to the **call** function.

For example, to **GET** a list of your **campaigns**:

```php
$campaigns 	= $this->mailchimp->call('GET', 'campaigns');
```

## Passing Arguments
You can pass an array of arguments as a third parameter. For example, to **GET** a list of your **campaigns** limited to just **5** results and only **sent** campaigns:

```php
$campaigns 	= $this->mailchimp->call('GET', 'campaigns', array('count' => 5, 'status' => 'sent'));
```

## Passing API Key Manually
You can pass your API key directly when initializing the library. This is useful if you are working with multiple MailChimp accounts.

```php
$config['api_key'] = '<your-key>';
$this->load->library('mailchimp', $config);
```

[![GitHub license](https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square)](https://raw.githubusercontent.com/stef686/codeigniter-mailchimp-api-v3/master/LICENSE)
