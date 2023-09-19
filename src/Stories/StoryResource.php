<?php

namespace CoconutSoftware\PivotalSdk\Stories;

use CoconutSoftware\PivotalSdk\BaseResource;
use CoconutSoftware\PivotalSdk\Stories\Requests\GetStory;

class StoryResource extends BaseResource
{
    public function get(int $id): Story
    {
        return $this->connector->send(new GetStory($id))->dto();
    }
}
