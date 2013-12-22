<?php

namespace TransactPRO\Gate\tests\Builders;

class RefundDataBuilderTest extends BuilderTestCase
{
    protected function setUp()
    {
        $this->builderClass = 'TransactPRO\Gate\Builders\RefundDataBuilder';
        $this->data = array(
            'init_transaction_id' => '13hpf5rp1e0ss72dypjnhalzn1wmrkfmsjtwzocg',
            'amount_to_refund'    => '100'
        );
        $this->buildData = $this->data;
    }

    public function getMandatoryFields()
    {
        return array(
            array('init_transaction_id'),
            array('amount_to_refund')
        );
    }

    public function testNonMandatoryFields($field = false, $expectedFieldValue = false)
    {
    }
    public function getNonMandatoryFields()
    {
    }
}
 