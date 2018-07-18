<?php

namespace tests\TransactPRO\Gate\Builders;

class CancelRequestDataBuilderTest extends BuilderTestCase
{
    protected function setUp()
    {
        $this->builderClass = 'TransactPRO\Gate\Builders\CancelRequestDataBuilder';
        $this->data = array(
            'init_transaction_id' => '13hpf5rp1e0ss72dypjnhalzn1wmrkfmsjtwzocg',
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
        return array();
    }
}
