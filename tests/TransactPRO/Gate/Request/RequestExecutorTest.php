<?php

namespace tests\TransactPRO\Gate\Request;

use TransactPRO\Gate\Request\RequestExecutor;

class RequestExecutorTest extends \PHPUnit_Framework_TestCase
{
    public function executeRequestBuilder($verifySSL)
    {
        $requestExecutor = new RequestExecutor('https://www.payment-api.lv', $verifySSL);
        return $requestExecutor->executeRequest('action', array());
    }
    
    public function testExecuteReturnResponse()
    {
        $response = $this->executeRequestBuilder(false);
        $this->assertInstanceOf('\TransactPRO\Gate\Response\Response', $response);
    }
    
    public function testExecuteReturnResponseWithVerifySSL()
    {
        $response = $this->executeRequestBuilder(true);
        $this->assertInstanceOf('\TransactPRO\Gate\Response\Response', $response);
    }
}
 
