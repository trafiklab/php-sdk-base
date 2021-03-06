<?php
/**
 * This Source Code Form is subject to the terms of the Mozilla Public
 * License, v. 2.0. If a copy of the MPL was not distributed with this
 * file, You can obtain one at https://mozilla.org/MPL/2.0/.
 */

namespace Trafiklab\Common\Model\Contract;

use DateTime;

/**
 * A VehicleStop, but with additional realtime data.
 *
 * @api
 * @see     VehicleStop
 * @package Trafiklab\Common\Model\Contract
 */
interface VehicleStopWithRealtime extends VehicleStop
{
    /**
     * @return DateTime|null   The estimated (real-time) departure time at this stop. Null if there is no data about
     *                         the departure time at this stop location.
     */
    public function getEstimatedDepartureTime(): ?DateTime;

    /**
     * The arrival time at this stop.
     *
     * @return DateTime|null The estimated (real-time) arrival time at this stop. Null if there is no data about the
     *                       arrival time at this stop location.
     */
    public function getEstimatedArrivalTime(): ?DateTime;

    /**
     * Whether or not this vehicle's stop is cancelled.
     *
     * @return bool
     */
    public function isCancelled(): bool;
}