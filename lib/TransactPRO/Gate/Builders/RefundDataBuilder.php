<?php

namespace TransactPRO\Gate\Builders;

class RefundDataBuilder extends Builder
{
    public function build()
    {
        return array(
            'init_transaction_id' => $this->getField('init_transaction_id'),
            'amount_to_refund' => $this->getField('amount_to_refund'),
            'merchant_transaction_id' => $this->getField('merchant_transaction_id'),
            'details' => $this->getField('details'),
        );
    }

    protected function checkData()
    {
        $this->checkMandatoryField('init_transaction_id');
        $this->checkMandatoryField('amount_to_refund');
    }
}