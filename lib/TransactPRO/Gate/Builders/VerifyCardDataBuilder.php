<?php

namespace TransactPRO\Gate\Builders;

class VerifyCardDataBuilder extends Builder
{
    public function build()
    {
        return array(
            'init_transaction_id' => $this->getField('init_transaction_id'),
            'customer_id' => $this->getField('customer_id'),
        );
    }

    protected function checkData()
    {
        $this->checkMandatoryField('init_transaction_id');
        $this->checkMandatoryField('customer_id');
    }
}