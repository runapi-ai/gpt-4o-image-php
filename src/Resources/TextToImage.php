<?php

declare(strict_types=1);

namespace RunApi\Gpt4oImage\Resources;

use RunApi\Core\Http\HttpClient;
use RunApi\Core\Models\TaskCreateResponse;
use RunApi\Core\RequestOptions;
use RunApi\Core\Resources\TypedConfiguredResource;
use RunApi\Gpt4oImage\Models\CompletedImageTaskResponse;
use RunApi\Gpt4oImage\Models\ImageTaskResponse;
use RunApi\Gpt4oImage\Types;

/**
 * Generates images from a text prompt, optionally guided by source images and a mask. For pure generation, provide `prompt`. For editing, provide `source_image_urls` and optionally `mask_url`. At least one of `prompt` or `source_image_urls` must be set.
 */
readonly class TextToImage extends TypedConfiguredResource
{
    /**
     * Submits a GPT-4o Image text-to-image task and returns immediately with a task id.
     *
     * @param array{
     *   model: string,
     *   prompt: string,
     *   aspect_ratio?: string,
     *   callback_url?: string,
     *   output_count?: int
     * } $params
     */
    public function create(array $params, ?RequestOptions $options = null): TaskCreateResponse
    {
        return parent::create($params, $options);
    }

    /**
     * Fetches the current status of a GPT-4o Image text-to-image task by id.
     */
    public function get(string $id, ?RequestOptions $options = null): ImageTaskResponse
    {
        $response = parent::get($id, $options);

        /** @var ImageTaskResponse $response */
        return $response;
    }

    /**
     * Submits a GPT-4o Image text-to-image task and polls until it completes.
     *
     * @param array{
     *   model: string,
     *   prompt: string,
     *   aspect_ratio?: string,
     *   callback_url?: string,
     *   output_count?: int
     * } $params
     */
    public function run(array $params, ?RequestOptions $options = null): CompletedImageTaskResponse
    {
        $response = parent::run($params, $options);

        /** @var CompletedImageTaskResponse $response */
        return $response;
    }

    /**
     * Create the resource using the shared RunAPI HTTP transport.
     */
    public static function fromHttp(HttpClient $http): self
    {
        return new self(
            $http,
            '/api/v1/gpt_4o_image/text_to_image',
            'gpt-4o-image/text-to-image',
            ImageTaskResponse::class,
            CompletedImageTaskResponse::class,
            Types::TEXT_TO_IMAGE_MODELS,
            'text-to-image',
            ImageTaskResponse::class,
            CompletedImageTaskResponse::class,
        );
    }
}
