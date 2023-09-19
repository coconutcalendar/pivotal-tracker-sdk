<?php

namespace CoconutCalendar\PivotalTrackerSdk\Projects;

use CoconutCalendar\PivotalTrackerSdk\BaseResource;
use CoconutCalendar\PivotalTrackerSdk\Projects\Requests\GetSearch;
use CoconutCalendar\PivotalTrackerSdk\Projects\Requests\GetProject;
use CoconutCalendar\PivotalTrackerSdk\Projects\Requests\GetAllProjects;

class ProjectResource extends BaseResource
{
    public function all(): Projects
    {
        return $this->connector->send(new GetAllProjects())->dto();
    }

    public function get(int $id): Project
    {
        return $this->connector->send(new GetProject($id))->dto();
    }

    public function search(GetSearch $searchRequest): Search
    {
        return $this->connector->send($searchRequest)->dto();
    }
}
