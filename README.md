# GPT-4o Image PHP SDK for RunAPI

[![Packagist](https://img.shields.io/packagist/v/runapi-ai/gpt-4o-image)](https://packagist.org/packages/runapi-ai/gpt-4o-image)
[![License](https://img.shields.io/github/license/runapi-ai/gpt-4o-image-php)](https://github.com/runapi-ai/gpt-4o-image-php/blob/main/LICENSE)

The GPT-4o Image PHP SDK is the Composer package for GPT-4o Image on RunAPI. Use it when your PHP application needs associative-array request bodies, task status lookup, polling helpers, file helpers, and consistent RunAPI errors.

## Install

```bash
composer require runapi-ai/gpt-4o-image
```

## Quick start

```php
<?php

require __DIR__ . "/vendor/autoload.php";

use RunApi\Gpt4oImage\Gpt4oImageClient;

$client = new Gpt4oImageClient(); // reads RUNAPI_API_KEY

$task = $client->textToImage->create([
    'model' => 'gpt-4o-image',
    'prompt' => 'A precise product render on white marble',
]);

$status = $client->textToImage->get($task->id);

$result = $client->textToImage->run([
    'model' => 'gpt-4o-image',
    'prompt' => 'A serene mountain lake at dawn',
]);

echo $result->images[0]->url . PHP_EOL;
```

Use `create()` to submit a task and return quickly, `get()` to fetch the latest task state, and `run()` when a script should create and poll until completion. In web request handlers, prefer `create()` plus webhook or later `get()` polling so a worker is not held open.

Returned file URLs are temporary. Download and store generated files in your own durable storage within the retention window.

All SDK exceptions inherit from `RunApi\Core\Errors\RunApiException`, including validation, authentication, rate limit, task failure, and task timeout errors.

## Links

- Model page: https://runapi.ai/models/gpt-4o-image
- SDK docs: https://runapi.ai/docs#sdk-gpt-4o-image
- Product docs: https://runapi.ai/docs#gpt-4o-image
- Pricing and rate limits: https://runapi.ai/models/gpt-4o-image
- Full catalog: https://runapi.ai/models
- GitHub repository: https://github.com/runapi-ai/gpt-4o-image-php
- Multi-language SDK repository: https://github.com/runapi-ai/gpt-4o-image-sdk

## License

Licensed under the Apache License, Version 2.0.
