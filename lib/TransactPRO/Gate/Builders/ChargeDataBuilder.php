<?php

namespace TransactPRO\Gate\Builders;

class ChargeDataBuilder extends Builder
{
    public function build()
    {
        return array(
            'f_extended'             => $this->getField('f_extended', 5),
            'init_transaction_id'    => $this->getField('init_transaction_id'),
            'cc'                     => $this->getField('cc'),
            'cvv'                    => $this->getField('cvv'),
            'expire'                 => $this->getField('expire'),
            'merchant_referring_url' => $this->getField('merchant_referring_url'),
        );
    }

    protected function checkData()
    {
        $this->checkMandatoryField('init_transaction_id');
        $this->checkMandatoryField('cc');
        $this->checkMandatoryField('expire');
    }
}