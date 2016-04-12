<?php

namespace TransactPRO\Gate\Builders;

class RefundDataBuilder extends Builder
{
    public function build()
    {
        $result = array(
            'init_transaction_id' => $this->getField('init_transaction_id'),
            'amount_to_refund' => $this->getField('amount_to_refund'),
        );

        if (isset($this->data['merchant_transaction_id'])) $result['merchant_transaction_id'] = $this->getField('merchant_transaction_id');
        if (isset($this->data['details'])) $result['details'] = $this->getField('details');

        return $result;
    }

    protected function checkData()
    {
        $this->checkMandatoryField('init_transaction_id');
        $this->checkMandatoryField('amount_to_refund');
    }
}