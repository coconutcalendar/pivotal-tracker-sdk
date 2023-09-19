<?php

namespace CoconutSoftware\PivotalSdk\Stories\Enums;

enum Priority
{
    case P0;
    case P1;
    case P2;
    case P3;
    case None;
    case Unknown;

    public static function fromData(string $priority): self
    {
        return match ($priority) {
            'p0' => self::P0,
            'p1' => self::P1,
            'p2' => self::P2,
            'p3' => self::P3,
            'none' => self::None,
            default => self::Unknown,
        };
    }
}
