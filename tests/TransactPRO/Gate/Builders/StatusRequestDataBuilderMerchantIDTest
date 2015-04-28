<?php
namespace tests\TransactPRO\Gate\Builders;
class StatusRequestDataBuilderMerchantIDTest extends BuilderTestCase
{
    protected function setUp()
    {
        $this->builderClass = 'TransactPRO\Gate\Builders\StatusRequestDataBuilderMerchantID';
        $this->data         = array(
            'request_type'        => 'transaction_status',
            'merchant_transaction_id' => '13hpf5rp1e0ss72dypjnhalzn1wmrkfmsjtwzocg',
            'f_extended'          => '5'
        );
        $this->buildData    = $this->data;
    }
    public function getMandatoryFields()
    {
        return array(
            array('merchant_transaction_id')
        );
    }
    public function getNonMandatoryFields()
    {
        return array(
            array('request_type', 'transaction_status'),
            array('f_extended', '5')
        );
    }
}
