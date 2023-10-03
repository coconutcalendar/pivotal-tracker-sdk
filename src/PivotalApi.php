<?php

namespace CoconutCalendar\PivotalTrackerSdk;

use CoconutCalendar\PivotalTrackerSdk\Projects\ProjectResource;
use CoconutCalendar\PivotalTrackerSdk\Stories\StoryResource;
use Illuminate\Cache\FileStore;
use Illuminate\Cache\Repository;
use Illuminate\Filesystem\Filesystem;
use Saloon\CachePlugin\Contracts\Cacheable;
use Saloon\CachePlugin\Contracts\Driver;
use Saloon\CachePlugin\Drivers\LaravelCacheDriver;
use Saloon\CachePlugin\Traits\HasCaching;
use Saloon\Http\Connector;

class PivotalApi extends Connector implements Cacheable
{
    use HasCaching;

    public function __construct(
        protected string $trackerToken,
        protected int $cacheSeconds = 600,
        protected string $cacheLocation = 'storage/files'
    ) {}

    public function resolveCacheDriver(): Driver
    {
        $files = new Filesystem();
        $store = new FileStore($files, $this->cacheLocation);
        $repo = new Repository($store);

        return new LaravelCacheDriver($repo);
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

    public function cacheExpiryInSeconds(): int
    {
        return $this->cacheSeconds;
    }
}
