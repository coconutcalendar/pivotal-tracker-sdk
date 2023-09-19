<?php

namespace CoconutCalendar\PivotalTrackerSdk;

use Saloon\Contracts\Connector;

class BaseResource
{
    public function __construct(protected Connector $connector)
    {
    }
}
