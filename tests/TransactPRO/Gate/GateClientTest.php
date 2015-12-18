<?php

namespace tests\TransactPRO\Gate;

use TransactPRO\Gate\GateClient;
use TransactPRO\Gate\Response\Response;
use tests\TransactPRO\Gate\Request\BasicRequestExecutor;

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
        $this->assertInstanceOf('tests\TransactPRO\Gate\Request\BasicRequestExecutor', $gateClient->getRequestExecutor());
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
            'merchant_site_url'       => 'http://www.example.com',
            'save_card'               => '1'
        ));
        $this->assertUnsuccessfulResponse($response);
    }

    public function testCharge()
    {
        $response = $this->gateClient->charge(array(
            'f_extended'          => '5',
            'init_transaction_id' => '13hpf5rp1e0ss72dypjnhalzn1wmrkfmsjtwzocg',
            'cc'                  => '5111111111111111',
            'cvv'                 => '111',
            'expire'              => '01/20'
        ));
        $this->assertUnsuccessfulResponse($response);
    }

    public function testInitDms()
    {
        $response = $this->gateClient->initDms(array(
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
            'merchant_site_url'       => 'http://www.example.com',
            'save_card'               => '1'
        ));
        $this->assertUnsuccessfulResponse($response);
    }

    public function testMakeHold()
    {
        $response = $this->gateClient->makeHold(array(
            'f_extended'          => '5',
            'init_transaction_id' => '13hpf5rp1e0ss72dypjnhalzn1wmrkfmsjtwzocg',
            'cc'                  => '5111111111111111',
            'cvv'                 => '111',
            'expire'              => '01/20'
        ));
        $this->assertUnsuccessfulResponse($response);
    }

    public function testChargeHold()
    {
        $response = $this->gateClient->chargeHold(array(
            'init_transaction_id' => '13hpf5rp1e0ss72dypjnhalzn1wmrkfmsjtwzocg'
        ));
        $this->assertUnsuccessfulResponse($response);
    }

    public function testCancelDms()
    {
        $response = $this->gateClient->cancelDms(array(
            'init_transaction_id' => '13hpf5rp1e0ss72dypjnhalzn1wmrkfmsjtwzocg',
            'amount_to_refund'    => '100'
        ));
        $this->assertUnsuccessfulResponse($response);
    }

    public function testRefund()
    {
        $response = $this->gateClient->refund(array(
            'init_transaction_id' => '13hpf5rp1e0ss72dypjnhalzn1wmrkfmsjtwzocg',
            'amount_to_refund'    => '100'
        ));
        $this->assertUnsuccessfulResponse($response);
    }

    public function testStatusRequest()
    {
        $response = $this->gateClient->statusRequest(array(
            'request_type'        => 'transaction_status',
            'init_transaction_id' => '13hpf5rp1e0ss72dypjnhalzn1wmrkfmsjtwzocg',
            'f_extended'          => '5'
        ));
        $this->assertUnsuccessfulResponse($response);
    }
    
    public function testStatusRequestMerchantID()
    {
        $response = $this->gateClient->statusRequestMerchantID(array(
            'request_type'        => 'transaction_status',
            'merchant_transaction_id' => '13hpf5rp1e0ss72dypjnhalzn1wmrkfmsjtwzocg',
            'f_extended'          => '5'
        ));
        $this->assertUnsuccessfulResponse($response);
    }

    /**
     * @param Response $response
     */
    private function assertUnsuccessfulResponse($response)
    {
        $this->assertInstanceOf('TransactPRO\Gate\Response\Response', $response, 'Result must be instance of TransactPRO\Gate\Response\Response class.');
        $this->assertFalse($response->isSuccessful(), 'Response must be unsuccessful');
        $this->assertContains("resolve host", $response->getResponseContent());
    }
}
 
