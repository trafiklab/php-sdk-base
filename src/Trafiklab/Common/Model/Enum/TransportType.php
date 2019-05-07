<?php


namespace Trafiklab\Common\Model\Enum;

/**
 * Used to distinguish different types of transport
 *
 * @api
 * @package Trafiklab\Common\Model\Enum
 */
abstract class TransportType
{
    public const BUS = "BUS";
    public const METRO = "SUBWAY";
    public const TRAM = "TRAM";
    public const TRAIN = "TRAIN";
    public const SHIP = "SHIP";
}
