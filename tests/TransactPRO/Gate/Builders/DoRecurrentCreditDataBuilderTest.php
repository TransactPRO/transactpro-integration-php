<?php

namespace tests\TransactPRO\Gate\Builders;

use TransactPRO\Gate\Builders\DoRecurrentCreditDataBuilder;

class DoRecurrentCreditDataBuilderTest extends BuilderTestCase
{
    protected function setUp()
    {
        $this->builderClass = DoRecurrentCreditDataBuilder::class;
        $this->data         = array(
            'f_extended'                => '5',
            'init_transaction_id'       => '13hpf5rp1e0ss72dypjnhalzn1wmrkfmsjtwzocg',
        );
        $this->buildData    = $this->data;
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
            array('f_extended', 5),
        );
    }
}