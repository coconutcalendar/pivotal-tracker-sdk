<?php

namespace CoconutCalendar\PivotalTrackerSdk;

use Saloon\Http\Connector;
use CoconutCalendar\PivotalTrackerSdk\Stories\StoryResource;
use CoconutCalendar\PivotalTrackerSdk\Projects\ProjectResource;

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
