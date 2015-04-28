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

    public function testParsedResponseIsEmptyIfError()
    {
        $response = new Response(Response::STATUS_ERROR, 'key1:value1~key2:value2');
        $this->assertEquals(array(), $response->getParsedResponse());
    }

    public function testParsedResponseIsCorrectIfSuccess()
    {
        $response = new Response(Response::STATUS_SUCCESS, 'key1:value1~key2:value2:some~key3');
        $this->assertEquals(array(
            'key1' => 'value1',
            'key2' => 'value2:some',
            'key3' => ''
        ), $response->getParsedResponse());
    }
    
    public function testGetTransactionStatusIfSuccess()
    {
        $response = new Response(Response::STATUS_SUCCESS, 'Status:Success');
        $this->assertEquals(true, $response->getTransactionStatus());
    }
    
    public function testGetTransactionStatusIfFailed()
    {
        $response = new Response(Response::STATUS_ERROR, 'Status:Failed');
        $this->assertEquals(false, $response->getTransactionStatus());
    }
    
    public function testGetTransactionStatusIfPending()
    {
        $response = new Response(Response::STATUS_ERROR, 'Status:Pending');
        $this->assertEquals(false, $response->getTransactionStatus());
    }
}
 
