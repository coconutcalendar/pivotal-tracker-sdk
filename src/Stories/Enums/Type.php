<?php

namespace CoconutSoftware\PivotalSdk\Stories\Enums;

enum Type
{
    case Feature;
    case Bug;
    case Chore;
    case Release;
    case Unknown;

    public static function fromData(string $type): self
    {
        return match ($type) {
            'feature' => self::Feature,
            'bug' => self::Bug,
            'chore' => self::Chore,
            'release' => self::Release,
            default => self::Unknown,
        };
    }
}
