<?php

namespace CoconutCalendar\PivotalTrackerSdk\Projects;

use Saloon\Http\Response;
use Illuminate\Support\Collection;
use CoconutCalendar\PivotalTrackerSdk\Stories\Story;

class Search
{
    protected array $stories = [];
    protected array $epics   = [];

    public function __construct(
        public int $storyCount,
        public int $doneStoryCount,
        public int $totalPoints,
        public int $totalPointsCompleted,
    ) {
    }

    public static function fromResponse(Response $response): self
    {
        return self::fromJsonObject($response->object());
    }

    public static function fromJsonObject(\stdClass $data): self
    {
        $search = new self(
            storyCount: $data->stories->total_hits,
            doneStoryCount: $data->stories->total_hits_with_done,
            totalPoints: $data->stories->total_points,
            totalPointsCompleted: $data->stories->total_points_completed,
        );

        foreach ($data->stories->stories as $storyJson) {
            $search->addStory(Story::fromJsonObject($storyJson));
        }

        return $search;
    }

    public function getStories(): array
    {
        return $this->stories;
    }

    protected function addStory(Story $story): void
    {
        $this->stories[] = $story;
    }

    protected function addEpic(): void
    {
        throw new \RuntimeException('Epics not yet implemented');
    }
}
