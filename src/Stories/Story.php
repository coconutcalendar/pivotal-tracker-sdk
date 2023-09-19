<?php

namespace CoconutCalendar\PivotalTrackerSdk\Stories;

use Saloon\Contracts\Response;
use CoconutCalendar\PivotalTrackerSdk\Stories\Enums\Type;
use CoconutCalendar\PivotalTrackerSdk\Stories\Enums\State;
use CoconutCalendar\PivotalTrackerSdk\Stories\Enums\Priority;

class Story
{
    public function __construct(
        public int      $id,
        public string   $url,
        public int      $projectId,
        public Type     $type,
        public string   $name,
        public Priority $priority,
        public State    $state,
        public array    $labels,
        public string   $created_at,
        public string   $updated_at,
        public ?int     $estimate = null,
        public ?int     $externalId = null,
    ) {
    }

    public static function fromResponse(Response $response): self
    {
        return self::fromJsonObject($response->object());
    }

    public static function fromJsonObject(\stdClass $data): self
    {
        $labels = [];
        foreach ($data->labels as $label) {
            $labels[] = $label->name;
        }

        return new static(
            id: $data->id,
            url: $data->url,
            projectId: $data->project_id,
            type: Type::fromData($data->story_type),
            name: $data->name,
            priority: Priority::fromData($data->story_priority),
            state: State::fromData($data->current_state),
            labels: $labels,
            created_at: $data->created_at,
            updated_at: $data->updated_at,
            estimate: $data->estimate ?? null,
            externalId: $data->external_id ?? null,
        );
    }
}
