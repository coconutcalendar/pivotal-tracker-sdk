<?php

namespace CoconutSoftware\PivotalSdk\Stories\Requests;

use Saloon\Http\Request;
use Saloon\Enums\Method;
use Saloon\Contracts\Response;
use CoconutSoftware\PivotalSdk\Stories\Story;

class GetStory extends Request
{
    protected Method $method = Method::GET;

    public function __construct(protected int $id)
    {
    }

    public function resolveEndpoint(): string
    {
        return "stories/{$this->id}";
    }

    public function createDtoFromResponse(Response $response): Story
    {
        return Story::fromResponse($response);
    }
}
