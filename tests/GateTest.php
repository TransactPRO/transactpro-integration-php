<?php

namespace TransactPRO\Gate\tests;

use TransactPRO\Gate\Gate;

class GateTest extends \PHPUnit_Framework_TestCase
{
    /** @var Gate */
    protected $gate;
    /** @var array */
    protected $merchantData;

    protected function setUp()
    {
        $this->merchantData = array('guid' => 'AAAA-AAAA-AAAA-AAAA', 'pwd' => '111');
        $this->gate         = new Gate($this->merchantData);
        parent::setUp();
    }

    public function testItCanBeInitializedWithValidMerchantDataWithoutError()
    {
        $this->assertEquals($this->merchantData, $this->gate->getMerchantData());
    }

    /**
     * @expectedException \TransactPRO\Gate\Exceptions\NotImplementedAction
     */
    public function testInitAreNotImplemented()
    {
        $this->gate->init();
    }

    /**
     * @expectedException \TransactPRO\Gate\Exceptions\NotImplementedAction
     */
    public function testChargeAreNotImplemented()
    {
        $this->gate->charge();
    }

    /**
     * @expectedException \TransactPRO\Gate\Exceptions\NotImplementedAction
     */
    public function testInitDmsAreNotImplemented()
    {
        $this->gate->initDms();
    }

    /**
     * @expectedException \TransactPRO\Gate\Exceptions\NotImplementedAction
     */
    public function testMakeHoldAreNotImplemented()
    {
        $this->gate->makeHold();
    }

    /**
     * @expectedException \TransactPRO\Gate\Exceptions\NotImplementedAction
     */
    public function testChargeHoldAreNotImplemented()
    {
        $this->gate->chargeHold();
    }

    /**
     * @expectedException \TransactPRO\Gate\Exceptions\NotImplementedAction
     */
    public function testCancelDmsAreNotImplemented()
    {
        $this->gate->cancelDms();
    }

    /**
     * @expectedException \TransactPRO\Gate\Exceptions\NotImplementedAction
     */
    public function testRefundAreNotImplemented()
    {
        $this->gate->refund();
    }

    /**
     * @expectedException \TransactPRO\Gate\Exceptions\NotImplementedAction
     */
    public function testStatusRequestAreNotImplemented()
    {
        $this->gate->statusRequest();
    }
}
 