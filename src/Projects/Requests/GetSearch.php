<?php

namespace CoconutCalendar\PivotalTrackerSdk\Projects\Requests;

use Saloon\Http\Request;
use Saloon\Enums\Method;
use Saloon\Contracts\Response;
use CoconutCalendar\PivotalTrackerSdk\Projects\Search;

class GetSearch extends Request
{

    protected Method $method = Method::GET;

    public function __construct(protected int $projectId)
    {
    }

    public function resolveEndpoint(): string
    {
        return "projects/{$this->projectId}/search";
    }

    public function createDtoFromResponse(Response $response): Search
    {
        return Search::fromResponse($response);
    }
}
