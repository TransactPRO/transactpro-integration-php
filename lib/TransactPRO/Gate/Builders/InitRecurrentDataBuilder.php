<?php

namespace TransactPRO\Gate\Builders;

class InitRecurrentDataBuilder extends Builder
{
    public function build()
    {
        return array(
            'rs'                      => $this->getField('rs'),
            'original_init_id'        => $this->getField('original_init_id'),
            'merchant_transaction_id' => $this->getField('merchant_transaction_id'),
            'amount'                  => $this->getField('amount'),
            'description'             => $this->getField('description')
        );
    }

    protected function checkData()
    {
        $this->checkMandatoryField('rs');
        $this->checkMandatoryField('original_init_id');
        $this->checkMandatoryField('merchant_transaction_id');
        $this->checkMandatoryField('amount');
    }
}
