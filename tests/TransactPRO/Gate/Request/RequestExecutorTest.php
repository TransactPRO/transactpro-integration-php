<?php

namespace tests\TransactPRO\Gate\Request;

use TransactPRO\Gate\Request\RequestExecutor;

class RequestExecutorTest extends \PHPUnit_Framework_TestCase
{
    public function testExecuteReturnResponse()
    {
        $requestExecutor = new RequestExecutor('https://www.payment-api.lv', false);
        $response = $requestExecutor->executeRequest('action', array());
        $this->assertInstanceOf('TransactPRO\Gate\Response\Response', $response);
    }
}
 