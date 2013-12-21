<?php

namespace TransactPRO\Gate;

use TransactPRO\Gate\Exceptions\NotImplementedAction;

/**
 * @package TransactPRO\Gate
 */
class Gate
{
    /**
     * @var array
     */
    private $merchantData;

    /**
     * @param array $merchantData <p>
     * Merchant access data
     * <code>array('guid' => '', 'pwd' => '');</code>
     * </p>
     */
    function __construct(array $merchantData)
    {
        $this->merchantData = $merchantData;
    }

    /**
     * @return array
     */
    public function getMerchantData()
    {
        return $this->merchantData;
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