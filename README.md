# GPT-4o Image PHP SDK for RunAPI

[![Packagist](https://img.shields.io/packagist/v/runapi-ai/gpt-4o-image)](https://packagist.org/packages/runapi-ai/gpt-4o-image)
[![License](https://img.shields.io/github/license/runapi-ai/gpt-4o-image-php)](https://github.com/runapi-ai/gpt-4o-image-php/blob/main/LICENSE)

The GPT-4o Image PHP SDK is the language-specific package for GPT-4o Image
on RunAPI. Use this package when your application needs Composer installs,
associative-array request bodies, task status lookup, and consistent RunAPI
errors in PHP.

This README is the PHP package guide for the public `gpt-4o-image-php` split
repository. For model details, use https://runapi.ai/models/gpt-4o-image; for API
reference, use https://runapi.ai/docs/api/gpt-4o-image/text-to-image; for SDK docs, use
https://runapi.ai/docs/resources/sdks.

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
    'aspect_ratio' => '1:1',
    'enable_prompt_expansion' => true,
    'mask_url' => 'sample',
    'output_count' => 1,
    'prompt' => 'A precise product render on white marble',
    'source_image_urls' => ['https://cdn.runapi.ai/public/samples/image.jpg'],
]);

$status = $client->textToImage->get($task->id);

$result = $client->textToImage->run([
    'model' => 'gpt-4o-image',
    'aspect_ratio' => '1:1',
    'enable_prompt_expansion' => true,
    'mask_url' => 'sample',
    'output_count' => 1,
    'prompt' => 'A serene mountain lake at dawn',
    'source_image_urls' => ['https://cdn.runapi.ai/public/samples/image.jpg'],
]);

echo $result->images[0]->url . PHP_EOL;
```

Use `create()` to submit a task and return quickly, `get()` to fetch the latest
task state, and `run()` when a script should create and poll until completion.
In web request handlers, prefer `create()` plus webhook or later `get()`
polling so a worker is not held open.


RunAPI-generated file URLs are temporary. Download and store generated files
in your own durable storage within the retention window; do not treat returned
URLs as long-term assets.

## Language notes

Pass request parameters as associative arrays with snake_case keys. The
available resources are `textToImage`. Keep `RUNAPI_API_KEY` in the environment
or your secret manager; never commit API keys or callback secrets.

## Links

- Model page: https://runapi.ai/models/gpt-4o-image
- SDK docs: https://runapi.ai/docs/resources/sdks
- Product docs: https://runapi.ai/docs/api/gpt-4o-image/text-to-image
- Pricing and rate limits: https://runapi.ai/models/gpt-4o-image
- Full catalog: https://runapi.ai/models
- GitHub repository: https://github.com/runapi-ai/gpt-4o-image-php
- Multi-language SDK repository: https://github.com/runapi-ai/gpt-4o-image-sdk

## License

Licensed under the Apache License, Version 2.0.
