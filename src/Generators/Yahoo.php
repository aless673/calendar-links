<?php

namespace Spatie\CalendarLinks\Generators;

use Spatie\CalendarLinks\Link;
use Spatie\CalendarLinks\Generator;

class Yahoo implements Generator
{
    public function generate(Link $link): string
    {
        $url = 'https://calendar.yahoo.com/?v=60&view=d&type=20';

        $from = new \DateTime($link->from);
        $to = new \DateTime($link->to);

        $url .= '&title='.urlencode($link->title);
        $url .= '&st='.$link->from;
        $url .= '&dur='.date_diff($from, $to)->format("%H%I");

        if ($link->description) {
            $url .= '&desc='.urlencode($link->description);
        }

        if ($link->address) {
            $url .= '&in_loc='.urlencode($link->address);
        }

        return $url;
    }
}
