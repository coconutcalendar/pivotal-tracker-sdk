<?php

namespace CoconutCalendar\PivotalTrackerSdk\Projects\Requests;

use Saloon\Http\Request;
use Saloon\Enums\Method;
use Saloon\Contracts\Response;
use CoconutCalendar\PivotalTrackerSdk\Projects\Project;

class GetProject extends Request
{
    protected Method $method = Method::GET;

    public function __construct(protected int $id)
    {
    }

    public function resolveEndpoint(): string
    {
        return "projects/{$this->id}";
    }

    public function createDtoFromResponse(Response $response): Project
    {
        return Project::fromResponse($response);
    }

}
