<?php

namespace tests\TransactPRO\Gate\Builders;

class DoP2PDataBuilderTest extends BuilderTestCase
{
    protected function setUp()
    {
        $this->builderClass = 'TransactPRO\Gate\Builders\DoP2PDataBuilder';
        $this->data         = array(
            'f_extended'                => '5',
            'init_transaction_id'       => '13hpf5rp1e0ss72dypjnhalzn1wmrkfmsjtwzocg',
            'cc_2'                      => '5111111111111111',
            'expire2'                   => '111',
            'merchant_referring_url'    => 'http://www.paymentform.example.com',
            'payment_purpose'           => '01',
        );
        $this->buildData    = $this->data;
    }

    public function getMandatoryFields()
    {
        return array(
            array('init_transaction_id'),
            array('cc_2'),
        );
    }

    public function getNonMandatoryFields()
    {
        return array(
            array('f_extended', 5),
            array('expire2'),
            array('merchant_referring_url'),
        );
    }
}
