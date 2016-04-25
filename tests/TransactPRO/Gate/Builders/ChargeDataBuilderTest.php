<?php

namespace tests\TransactPRO\Gate\Builders;

class ChargeDataBuilderTest extends BuilderTestCase
{
    protected function setUp()
    {
        $this->builderClass = 'TransactPRO\Gate\Builders\ChargeDataBuilder';
        $this->data         = array(
            'f_extended'                => '5',
            'init_transaction_id'       => '13hpf5rp1e0ss72dypjnhalzn1wmrkfmsjtwzocg',
            'cc'                        => '5111111111111111',
            'cvv'                       => '111',
            'expire'                    => '01/20',
            'merchant_referring_url'    => 'http://www.paymentform.example.com',
        );
        $this->buildData    = $this->data;
    }

    public function getMandatoryFields()
    {
        return array(
            array('init_transaction_id'),
            array('cc'),
            array('expire')
        );
    }

    public function getNonMandatoryFields()
    {
        return array(
            array('f_extended', 5)
        );
    }

}
 
