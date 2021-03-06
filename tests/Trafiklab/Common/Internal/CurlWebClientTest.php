<?php
/**
 * This Source Code Form is subject to the terms of the Mozilla Public
 * License, v. 2.0. If a copy of the MPL was not distributed with this
 * file, You can obtain one at https://mozilla.org/MPL/2.0/.
 */

namespace Trafiklab\Common\Internal;


use PHPUnit_Framework_TestCase;
use Trafiklab\Common\Model\Exceptions\RequestTimedOutException;

class CurlWebClientTest extends PHPUnit_Framework_TestCase
{

    /**
     * @throws RequestTimedOutException
     */
    function testMakeRequest_response200_shouldReturnWebResponse()
    {
        $webclient = new CurlWebClient("Trafiklab/php-sdk-base Unit tests");
        $webResponse = $webclient->makeRequest("https://httpstat.us/200", ['sleep' => 5]);
        self::assertEquals(200, $webResponse->getResponseCode());
        self::assertEquals("https://httpstat.us/200?sleep=5", $webResponse->getRequestUrl());
        self::assertEquals("Trafiklab/php-sdk-base Unit tests", $webResponse->getRequestUserAgent());
        self::assertEquals("200 OK", $webResponse->getResponseBody());
        self::assertArrayHasKey('sleep', $webResponse->getRequestParameters());
        self::assertEquals(5, $webResponse->getRequestParameters()['sleep']);
        self::assertEquals(5, $webResponse->getRequestParameter('sleep'));
        self::assertEquals(null, $webResponse->getRequestParameter('sleeps'));
    }

    /**
     * @throws RequestTimedOutException
     */
    function testMakeRequest_timeout_shouldThrowTimedOutException()
    {
        $webclient = new CurlWebClient("Trafiklab/php-sdk-base Unit tests");
        $this->expectException(RequestTimedOutException::class);
        $webclient->makeRequest("https://httpstat.us/200", ['sleep' => 11000]);
    }


    /**
     * @throws RequestTimedOutException
     */
    function testMakeRequest_multipleRequests_shouldReturnWebResponseFromCache()
    {
        $webclient = new CurlWebClient("Trafiklab/php-sdk-base Unit tests");
        $webclient->makeRequest("https://httpstat.us/200", []);
        $webResponse = $webclient->makeRequest("https://httpstat.us/200", []);
        self::assertTrue($webResponse->isFromLocalCache());
    }
}