<?php

declare(strict_types=1);

namespace RunApi\Gpt4oImage;

use RunApi\Core\BaseClient;
use RunApi\Core\ClientOptions;
use RunApi\Gpt4oImage\Resources\TextToImage;

/**
 * Provides GPT-4o powered image generation with optional editing via source images and masks.
 *
 * Exposes typed model resources plus the universal files and account resources.
 */
final class Gpt4oImageClient extends BaseClient
{
    /**
     * Text to image operations.
     */
    public readonly TextToImage $textToImage;

    /**
     * Create a GPT-4o Image client with optional API key, base URL, and transport overrides.
     */
    public function __construct(ClientOptions $options = new ClientOptions())
    {
        parent::__construct($options);
        $this->textToImage = TextToImage::fromHttp($this->http);
    }
}
