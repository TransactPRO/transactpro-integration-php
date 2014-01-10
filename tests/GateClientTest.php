<?php

namespace TransactPRO\Gate\tests;

use TransactPRO\Gate\GateClient;
use TransactPRO\Gate\Response\Response;
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

    public function testInit()
    {
        $response = $this->gateClient->init(array(
            'rs'                      => 'AAAA',
            'merchant_transaction_id' => microtime(true),
            'user_ip'                 => '127.0.0.1',
            'description'             => 'Test description',
            'amount'                  => '100',
            'currency'                => 'LVL',
            'name_on_card'            => 'Vasyly Pupkin',
            'street'                  => 'Main street 1',
            'zip'                     => 'LV-0000',
            'city'                    => 'Riga',
            'country'                 => 'LV',
            'state'                   => 'NA',
            'email'                   => 'email@example.lv',
            'phone'                   => '+371 11111111',
            'card_bin'                => '511111',
            'bin_name'                => 'BANK',
            'bin_phone'               => '+371 11111111',
            'merchant_site_url'       => 'http://www.example.com'
        ));
        $this->assertUnsuccessfulResponse($response);
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

    /**
     * @param Response $response
     */
    private function assertUnsuccessfulResponse($response)
    {
        $this->assertInstanceOf('TransactPRO\Gate\Response\Response', $response, 'Result must be instance of TransactPRO\Gate\Response\Response class.');
        $this->assertFalse($response->isSuccessful(), 'Response must be unsuccessful');
        $this->assertEquals("Couldn't resolve host 'www.payment-api.com'", $response->getResponseContent());
    }
}
 