<?php

namespace TransactPRO\Gate;

use TransactPRO\Gate\Exceptions\NotImplementedAction;
use TransactPRO\Gate\Builders\AccessDataBuilder;

/**
 * @package TransactPRO\Gate
 */
class GateClient
{
    /**
     * @var array
     */
    private $accessData;

    /**
     * @param array $accessData
     */
    function __construct(array $accessData)
    {
        $accessDataBuilder = new AccessDataBuilder($accessData);
        $this->accessData = $accessDataBuilder->build();
    }

    /**
     * @return array
     */
    public function getAccessData()
    {
        return $this->accessData;
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