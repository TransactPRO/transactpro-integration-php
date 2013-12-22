<?php

namespace TransactPRO\Gate\Request;

use TransactPRO\Gate\Response\Response;

class RequestExecutor implements RequestExecutorInterface
{
    /**
     * @param string $url Gateway url
     * @param string $action Action to execute
     * @param array $postData Data for sending
     * @return Response
     */
    public function executeRequest($url, $action, array $postData)
    {
        return new Response();
    }
}