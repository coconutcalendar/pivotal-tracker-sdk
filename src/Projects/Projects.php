<?php

namespace CoconutCalendar\PivotalTrackerSdk\Projects;

use Saloon\Contracts\Response;

class Projects
{
    public array $projects = [];

    public static function fromResponse(Response $response): self
    {
        return self::fromJsonArray($response->json());
    }

    protected static function fromJsonArray(array $data): self
    {
        $self = new self();

        foreach ($data as $project) {
            $self->projects[] = new Project(
                id: $project['id'],
                name: $project['name'],
                currentIteration: $project['current_iteration_number'],
            );
        }

        return $self;
    }
}
