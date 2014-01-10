<?php

namespace TransactPRO\Gate;

use TransactPRO\Gate\Exceptions\NotImplementedAction;
use TransactPRO\Gate\Builders\AccessDataBuilder;
use TransactPRO\Gate\Request\RequestExecutor;
use TransactPRO\Gate\Request\RequestExecutorInterface;

/**
 * @package TransactPRO\Gate
 */
class GateClient
{
    /** @var array */
    private $accessData;
    /** @var RequestExecutorInterface */
    private $requestExecutor;

    /**
     * @param array $accessData
     * @param RequestExecutorInterface $requestExecutor
     */
    function __construct(array $accessData, RequestExecutorInterface $requestExecutor = null)
    {
        $accessDataBuilder     = new AccessDataBuilder($accessData);
        $this->accessData      = $accessDataBuilder->build();
        $this->requestExecutor = $requestExecutor ? $requestExecutor : new RequestExecutor($this->accessData['apiUrl'], $this->accessData['verifySSL']);
    }

    /**
     * @return array
     */
    public function getAccessData()
    {
        return $this->accessData;
    }

    /**
     * @return RequestExecutorInterface
     */
    public function getRequestExecutor()
    {
        return $this->requestExecutor;
    }

    /**
     * @throws Exceptions\NotImplementedAction
     */
    public function init()
    {
        throw new NotImplementedAction();
    }

    /**
     * @throws Exceptions\NotImplementedAction
     */
    public function charge()
    {
        throw new NotImplementedAction();
    }

    /**
     * @throws Exceptions\NotImplementedAction
     */
    public function initDms()
    {
        throw new NotImplementedAction();
    }

    /**
     * @throws Exceptions\NotImplementedAction
     */
    public function makeHold()
    {
        throw new NotImplementedAction();
    }

    /**
     * @throws Exceptions\NotImplementedAction
     */
    public function chargeHold()
    {
        throw new NotImplementedAction();
    }

    /**
     * @throws Exceptions\NotImplementedAction
     */
    public function cancelDms()
    {
        throw new NotImplementedAction();
    }

    /**
     * @throws Exceptions\NotImplementedAction
     */
    public function refund()
    {
        throw new NotImplementedAction();
    }

    /**
     * @throws Exceptions\NotImplementedAction
     */
    public function statusRequest()
    {
        throw new NotImplementedAction();
    }
} 