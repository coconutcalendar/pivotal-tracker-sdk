<?php

namespace CoconutCalendar\PivotalTrackerSdk\Stories;

use CoconutCalendar\PivotalTrackerSdk\BaseResource;
use CoconutCalendar\PivotalTrackerSdk\Stories\Requests\GetStory;

class StoryResource extends BaseResource
{
    public function get(int $id): Story
    {
        return $this->connector->send(new GetStory($id))->dto();
    }
}
