<?php

namespace tests\TransactPRO\Gate\Request;

use TransactPRO\Gate\Request\RequestExecutor;

class RequestExecutorTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->requestExecutor = new RequestExecutor('https://www.payment-api.lv', false);
    }
    
    public function testExecuteReturnResponse()
    {
        $response = $this->requestExecutor->executeRequest('action', array());
        $this->assertInstanceOf('TransactPRO\Gate\Response\Response', $response);
    }
    
    public function testConstructApiUrl()
    {
        $this->assertEquals('https://www.payment-api.lv/gwprocessor2.php?a=action', $this->requestExecutor->constructApiUrl('action'));
    }
}
 
