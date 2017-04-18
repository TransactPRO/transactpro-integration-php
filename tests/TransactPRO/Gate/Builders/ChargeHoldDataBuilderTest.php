<?php

namespace tests\TransactPRO\Gate\Builders;

class ChargeHoldDataBuilderTest extends BuilderTestCase
{
    protected function setUp()
    {
        $this->builderClass = 'TransactPRO\Gate\Builders\ChargeHoldDataBuilder';
        $this->data = array(
            'init_transaction_id' => '13hpf5rp1e0ss72dypjnhalzn1wmrkfmsjtwzocg',
            'charge_amount' => '100',
        );
        $this->buildData = $this->data;
    }

    public function getMandatoryFields()
    {
        return array(
            array('init_transaction_id'),
        );
    }

    public function getNonMandatoryFields()
    {
        return array(
            array('charge_amount', ''),
        );
    }
}
