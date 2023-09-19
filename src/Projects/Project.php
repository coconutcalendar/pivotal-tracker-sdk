<?php

namespace CoconutCalendar\PivotalTrackerSdk\Projects;

use Saloon\Contracts\Response;

class Project
{
    public function __construct(
        public int    $id,
        public string $name,
        public int    $currentIteration,
    ) {
    }

    public static function fromResponse(Response $response): self
    {
        return self::fromJsonObject($response->object());
    }

    public static function fromJsonObject(\stdClass $data): self
    {
        return new static(
            id: $data->id,
            name: $data->name,
            currentIteration: $data->current_iteration_number,
        );
    }
}
