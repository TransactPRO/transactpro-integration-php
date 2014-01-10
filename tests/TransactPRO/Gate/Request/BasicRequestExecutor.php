<?php

namespace tests\TransactPRO\Gate\Request;

use TransactPRO\Gate\Request\RequestExecutorInterface;
use TransactPRO\Gate\Response\Response;

class BasicRequestExecutor implements RequestExecutorInterface
{
    /** @var string */
    private $url;
    /** @var bool */
    private $verifySSL;

    /**
     * @param string $url Gateway url
     * @param bool $verifySSL
     */
    public function __construct($url, $verifySSL)
    {
        $this->url       = $url;
        $this->verifySSL = $verifySSL;
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