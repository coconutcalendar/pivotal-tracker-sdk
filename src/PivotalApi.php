<?php

namespace CoconutSoftware\PivotalSdk;

use Saloon\Http\Connector;
use CoconutSoftware\PivotalSdk\Stories\StoryResource;
use CoconutSoftware\PivotalSdk\Projects\ProjectResource;

class PivotalApi extends Connector
{
    public function __construct(protected string $trackerToken)
    {
    }

    public function resolveBaseUrl(): string
    {
        return 'https://www.pivotaltracker.com/services/v5';
    }

    protected function defaultHeaders(): array
    {
        return [
            'Accept'         => 'application/json',
            'X-TrackerToken' => $this->trackerToken,
        ];
    }

    public function stories(): StoryResource
    {
        return new StoryResource($this);
    }

    public function projects(): ProjectResource
    {
        return new ProjectResource($this);
    }
}
