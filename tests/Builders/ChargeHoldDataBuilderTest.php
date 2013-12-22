<?php

namespace TransactPRO\Gate\tests\Builders;

class ChargeHoldDataBuilderTest extends BuilderTestCase
{
    protected function setUp()
    {
        $this->builderClass = 'TransactPRO\Gate\Builders\ChargeHoldDataBuilder';
        $this->data = array(
            'init_transaction_id' => '13hpf5rp1e0ss72dypjnhalzn1wmrkfmsjtwzocg'
        );
        $this->buildData = $this->data;
    }

    public function getMandatoryFields()
    {
        return array(
            array('init_transaction_id')
        );
    }

    public function testNonMandatoryFields($field = false, $expectedFieldValue = false)
    {
    }

    public function getNonMandatoryFields()
    {
    }
}
 