<?php

namespace EightPoints\Bundle\GuzzleBundle\Tests\Log;

use       EightPoints\Bundle\GuzzleBundle\Log\LogResponse;

/**
 * Class LogResponseTest
 *
 * @package   EightPoints\Bundle\GuzzleBundle\Test\Log
 * @author    Florian Preusner
 *
 * @version   2.1
 * @since     2015-05
 */
class LogResponseTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var \GuzzleHttp\Psr7\Response
     */
    protected $response;

    /**
     * @var array
     */
    protected $headers = [
        'Date'          => ['Sun, 07 Jun 2015 16:32:50 GMT'],
        'Expires'       => ['-1'],
        'Cache-Control' => ['private, max-age=0'],
        'Content-Type'  => ['text/html; charset=ISO-8859-1']
    ];

    /**
     * SetUp: before executing each test function
     *
     * @author  Florian Preusner
     * @version 2.1
     * @since   2015-06
     */
    public function setUp() {

        $this->response = $this->getMockBuilder('GuzzleHttp\Psr7\Response')
                               ->disableOriginalConstructor()
                               ->getMock();

        $bodyMock = $this->getMockBuilder('GuzzleHttp\Psr7\Stream')
                         ->disableOriginalConstructor()
                         ->getMock();

        $bodyMock->method('__toString')->willReturn('test body');

        $this->response->method('getStatusCode')->willReturn(200);
        $this->response->method('getHeaders')->willReturn($this->headers);
        $this->response->method('getBody')->willReturn($bodyMock);
        $this->response->method('getProtocolVersion')->willReturn('1.1');
    } // end: setUp()

    /**
     * Test Status Code
     *
     * @author  Florian Preusner
     * @version 2.1
     * @since   2015-06
     *
     * @covers  EightPoints\Bundle\GuzzleBundle\Log\LogResponse::__construct
     * @covers  EightPoints\Bundle\GuzzleBundle\Log\LogResponse::save
     * @covers  EightPoints\Bundle\GuzzleBundle\Log\LogResponse::getStatusCode
     * @covers  EightPoints\Bundle\GuzzleBundle\Log\LogResponse::setStatusCode
     */
    public function testStatusCode() {

        $response = new LogResponse($this->response);

        $this->assertSame(200, $response->getStatusCode());
    } // end: testStatusCode()

    /**
     * Test Body
     *
     * @author  Florian Preusner
     * @version 2.1
     * @since   2015-06
     *
     * @covers  EightPoints\Bundle\GuzzleBundle\Log\LogResponse::__construct
     * @covers  EightPoints\Bundle\GuzzleBundle\Log\LogResponse::save
     * @covers  EightPoints\Bundle\GuzzleBundle\Log\LogResponse::getBody
     * @covers  EightPoints\Bundle\GuzzleBundle\Log\LogResponse::setBody
     */
    public function testBody() {

        $response = new LogResponse($this->response);

        $this->assertSame('test body', $response->getBody());
    } // end: testBody()

    /**
     * Test Protocol Version
     *
     * @author  Florian Preusner
     * @version 2.1
     * @since   2015-06
     *
     * @covers  EightPoints\Bundle\GuzzleBundle\Log\LogResponse::__construct
     * @covers  EightPoints\Bundle\GuzzleBundle\Log\LogResponse::save
     * @covers  EightPoints\Bundle\GuzzleBundle\Log\LogResponse::getProtocolVersion
     * @covers  EightPoints\Bundle\GuzzleBundle\Log\LogResponse::setProtocolVersion
     */
    public function testProtocolVersion() {

        $response = new LogResponse($this->response);

        $this->assertSame('1.1', $response->getProtocolVersion());
    } // end: testProtocolVersion()

    /**
     * Test Headers
     *
     * @author  Florian Preusner
     * @version 2.1
     * @since   2015-06
     *
     * @covers  EightPoints\Bundle\GuzzleBundle\Log\LogResponse::__construct
     * @covers  EightPoints\Bundle\GuzzleBundle\Log\LogResponse::save
     * @covers  EightPoints\Bundle\GuzzleBundle\Log\LogResponse::getHeaders
     * @covers  EightPoints\Bundle\GuzzleBundle\Log\LogResponse::setHeaders
     */
    public function testHeaders() {

        $response = new LogResponse($this->response);

        $this->assertSame($this->headers, $response->getHeaders());
    } // end: testProtocolVersion()
} // end: LogResponseTest
