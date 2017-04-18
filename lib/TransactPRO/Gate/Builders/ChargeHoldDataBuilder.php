<?php

namespace TransactPRO\Gate\Builders;

class ChargeHoldDataBuilder extends Builder
{
    public function build()
    {
        return array(
            'init_transaction_id' => $this->getField('init_transaction_id'),
            'charge_amount' => $this->getField('charge_amount'),
        );
    }

    protected function checkData()
    {
        $this->checkMandatoryField('init_transaction_id');
    }
}