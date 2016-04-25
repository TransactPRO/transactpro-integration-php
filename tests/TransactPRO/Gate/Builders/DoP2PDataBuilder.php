<?php

namespace TransactPRO\Gate\Builders;

class DoP2PDataBuilder extends ChargeDataBuilder
{
    public function build()
    {
        return array(
            'cc_2'                   => $this->getField('cc_2'),
            'init_transaction_id'    => $this->getField('init_transaction_id'),
            'f_extended'             => $this->getField('f_extended', 5),
            'expire2'                => $this->getField('expire2'),
            'merchant_referring_url' => $this->getField('merchant_referring_url'),
        );
    }

    protected function checkData()
    {
        $this->checkMandatoryField('cc_2');
        $this->checkMandatoryField('init_transaction_id');
    }
}