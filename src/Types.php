<?php

declare(strict_types=1);

namespace RunApi\Gpt4oImage;

/**
 * Constants for model slugs supported by the GPT-4o Image PHP SDK.
 */
final class Types
{
    /** @var list<string> */
    public const TEXT_TO_IMAGE_MODELS = ['gpt-4o-image'];

    private function __construct()
    {
    }
}
