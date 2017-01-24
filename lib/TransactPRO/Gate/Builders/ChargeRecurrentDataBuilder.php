<?php

namespace TransactPRO\Gate\Builders;

class ChargeRecurrentDataBuilder extends Builder
{
    public function build()
    {
        return array(
            'init_transaction_id' => $this->getField('init_transaction_id'),
            'f_extended'          => $this->getField('f_extended', 5)
        );
    }

    protected function checkData()
    {
        $this->checkMandatoryField('init_transaction_id');
    }
}
