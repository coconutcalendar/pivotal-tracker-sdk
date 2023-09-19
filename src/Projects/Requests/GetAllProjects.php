<?php

namespace CoconutSoftware\PivotalSdk\Projects\Requests;

use Saloon\Http\Request;
use Saloon\Enums\Method;
use Saloon\Contracts\Response;
use CoconutSoftware\PivotalSdk\Projects\Projects;

class GetAllProjects extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "projects";
    }

    public function createDtoFromResponse(Response $response): Projects
    {
        return Projects::fromResponse($response);
    }

}
