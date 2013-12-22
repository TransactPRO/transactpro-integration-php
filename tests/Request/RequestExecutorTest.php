<?php

namespace TransactPRO\Gate\tests\Request;

use TransactPRO\Gate\Request\RequestExecutor;

class RequestExecutorTest extends \PHPUnit_Framework_TestCase
{
    public function testExecuteReturnResponse()
    {
        $requestExecutor = new RequestExecutor();
        $response = $requestExecutor->executeRequest('https://www.payment-api.lv', 'action', array());
        $this->assertInstanceOf('TransactPRO\Gate\Response\Response', $response);
    }
}
 