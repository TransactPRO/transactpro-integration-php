<?php

namespace TransactPRO\Gate\tests;

use TransactPRO\Gate\GateClient;
use TransactPRO\Gate\tests\Request\BasicRequestExecutor;

class GateClientTest extends \PHPUnit_Framework_TestCase
{
    /** @var GateClient */
    protected $gateClient;
    /** @var array */
    protected $accessData;

    public function setUp()
    {
        $this->accessData = array(
            'apiUrl'    => 'https://www.payment-api.com',
            'guid'      => 'AAAA-AAAA-AAAA-AAAA',
            'pwd'       => '111',
            'verifySSL' => false
        );
        $this->gateClient = new GateClient($this->accessData);
        parent::setUp();
    }

    public function testItCanBeInitializedWithValidMerchantDataWithoutError()
    {
        $buildAccessData        = $this->accessData;
        $buildAccessData['pwd'] = sha1($this->accessData['pwd']);
        $this->assertEquals($buildAccessData, $this->gateClient->getAccessData());
    }

    public function testItCanBeInitializedWithDefaultRequestExecutor()
    {
        $gateClient = new GateClient($this->accessData);
        $this->assertInstanceOf('TransactPRO\Gate\Request\RequestExecutor', $gateClient->getRequestExecutor());
    }

    public function testItCanBeInitializedWithCustomRequestExecutor()
    {
        $gateClient = new GateClient($this->accessData, new BasicRequestExecutor('', false));
        $this->assertInstanceOf('TransactPRO\Gate\tests\Request\BasicRequestExecutor', $gateClient->getRequestExecutor());
    }

    /**
     * @expectedException \TransactPRO\Gate\Exceptions\NotImplementedAction
     */
    public function testInitAreNotImplemented()
    {
        $this->gateClient->init();
    }

    /**
     * @expectedException \TransactPRO\Gate\Exceptions\NotImplementedAction
     */
    public function testChargeAreNotImplemented()
    {
        $this->gateClient->charge();
    }

    /**
     * @expectedException \TransactPRO\Gate\Exceptions\NotImplementedAction
     */
    public function testInitDmsAreNotImplemented()
    {
        $this->gateClient->initDms();
    }

    /**
     * @expectedException \TransactPRO\Gate\Exceptions\NotImplementedAction
     */
    public function testMakeHoldAreNotImplemented()
    {
        $this->gateClient->makeHold();
    }

    /**
     * @expectedException \TransactPRO\Gate\Exceptions\NotImplementedAction
     */
    public function testChargeHoldAreNotImplemented()
    {
        $this->gateClient->chargeHold();
    }

    /**
     * @expectedException \TransactPRO\Gate\Exceptions\NotImplementedAction
     */
    public function testCancelDmsAreNotImplemented()
    {
        $this->gateClient->cancelDms();
    }

    /**
     * @expectedException \TransactPRO\Gate\Exceptions\NotImplementedAction
     */
    public function testRefundAreNotImplemented()
    {
        $this->gateClient->refund();
    }

    /**
     * @expectedException \TransactPRO\Gate\Exceptions\NotImplementedAction
     */
    public function testStatusRequestAreNotImplemented()
    {
        $this->gateClient->statusRequest();
    }
}
 