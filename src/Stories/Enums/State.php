<?php

namespace CoconutSoftware\PivotalSdk\Stories\Enums;

enum State
{
    case Accepted;
    case Delivered;
    case Finished;
    case Started;
    case Rejected;
    case Planned;
    case Unstarted;
    case Unscheduled;
    case Unknown;

    public static function fromData(string $state): self
    {
        return match ($state) {
            'accepted' => self::Accepted,
            'delivered' => self::Delivered,
            'finished' => self::Finished,
            'started' => self::Started,
            'rejected' => self::Rejected,
            'planned' => self::Planned,
            'unstarted' => self::Unstarted,
            'unscheduled' => self::Unscheduled,
            default => self::Unknown,
        };
    }
}
