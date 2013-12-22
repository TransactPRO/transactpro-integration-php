<?php

namespace TransactPRO\Gate\Request;

use TransactPRO\Gate\Response\Response;

class RequestExecutor implements RequestExecutorInterface
{
    /** @var string */
    private $url;
    /**
     * @param string $url Gateway url
     */
    public function __construct($url)
    {
        $this->url = $url;
    }

    /**
     * @param string $action Action to execute
     * @param array $postData Data for sending
     * @return Response
     */
    public function executeRequest($action, array $postData)
    {
        return new Response(Response::STATUS_ERROR, 'NotImplemented');
    }
}