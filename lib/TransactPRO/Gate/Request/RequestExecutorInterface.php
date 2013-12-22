<?php

namespace TransactPRO\Gate\Request;

interface RequestExecutorInterface
{
    /**
     * @param string $url Gateway url
     */
    public function __construct($url);

    /**
     * @param string $action Action to execute
     * @param array $postData Data for sending
     * @return mixed
     */
    public function executeRequest($action, array $postData);
} 