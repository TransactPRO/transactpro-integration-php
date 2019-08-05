<?php

namespace TransactPRO\Gate\Builders;

class CancelDmsDataBuilderr extends Builder
{
    public function build()
    {
        $result = array(
            'init_transaction_id' => $this->getField('init_transaction_id'),
        );

        if (isset($this->data['merchant_transaction_id'])) $result['merchant_transaction_id'] = $this->getField('merchant_transaction_id');
        if (isset($this->data['details'])) $result['details'] = $this->getField('details');

        return $result;
    }

    protected function checkData()
    {
        $this->checkMandatoryField('init_transaction_id');
    }
}