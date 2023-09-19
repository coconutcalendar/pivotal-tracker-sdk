<?php

namespace CoconutSoftware\PivotalSdk\Projects;

use CoconutSoftware\PivotalSdk\BaseResource;
use CoconutSoftware\PivotalSdk\Projects\Requests\GetSearch;
use CoconutSoftware\PivotalSdk\Projects\Requests\GetProject;
use CoconutSoftware\PivotalSdk\Projects\Requests\GetAllProjects;

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
