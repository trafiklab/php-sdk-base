<?php

namespace Trafiklab\Common\Model\Contract;

use Trafiklab\Common\Internal\WebResponseImpl;

/**
 * A timetable response from a transportation API.
 *
 * @api
 * @package Trafiklab\Common\Model\Contract
 */
interface TimeTableResponse
{

    /**
     * Get the original response from the API
     *
     * @return WebResponseImpl
     */
    public function getOriginalApiResponse(): WebResponseImpl;

    /**
     * @return TimeTableEntry[] The requested timetable as an array of timetable entries.
     */
    public function getTimetable(): array;

    /**
     * @return int The type of the stops in this timetable.
     */
    public function getType(): int;
}