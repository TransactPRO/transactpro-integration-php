<?php

namespace TransactPRO\Gate\tests\Request;

use TransactPRO\Gate\Request\RequestExecutorInterface;
use TransactPRO\Gate\Response\Response;

class BasicRequestExecutor implements RequestExecutorInterface
{
    /**
     * @param string $url Gateway url
     * @param string $action Action to execute
     * @param array $postData Data for sending
     * @return mixed
     */
    public function executeRequest($url, $action, array $postData)
    {
        return new Response();
    }
}