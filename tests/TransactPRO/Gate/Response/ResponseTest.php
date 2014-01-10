<?php

namespace tests\TransactPRO\Gate\Response;

use TransactPRO\Gate\Response\Response;

class ResponseTest extends \PHPUnit_Framework_TestCase
{
    public function testItCanBeCreatedWithoutErrors()
    {
        $response = new Response(Response::STATUS_SUCCESS, 'content');
        $this->assertEquals(Response::STATUS_SUCCESS, $response->getResponseStatus());
        $this->assertEquals('content', $response->getResponseContent());
    }

    /**
     * @dataProvider getErrorStatuses
     */
    public function testAllExceptSuccessAreFailure($status)
    {
        $response = new Response($status, '');
        $this->assertEquals(Response::STATUS_ERROR, $response->getResponseStatus());
    }

    public function getErrorStatuses()
    {
        return array(
            array(Response::STATUS_ERROR),
            array(''),
            array(5),
            array(new \stdClass()),
        );
    }

    public function testIsSuccessfulReturnTrueONSuccess()
    {
        $response = new Response(Response::STATUS_SUCCESS, '');
        $this->assertTrue($response->isSuccessful());
    }

    public function testIsSuccessfulReturnFalseONFailure()
    {
        $response = new Response(Response::STATUS_ERROR, '');
        $this->assertFalse($response->isSuccessful());
    }

}
 