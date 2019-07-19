<?php

namespace TransactPRO\Gate\Builders;

class InitRecurrentDataBuilder extends Builder
{
    public function build()
    {
        $data = array(
            'rs'                      => $this->getField('rs'),
            'original_init_id'        => $this->getField('original_init_id'),
            'merchant_transaction_id' => $this->getField('merchant_transaction_id'),
            'amount'                  => $this->getField('amount'),
            'description'             => $this->getField('description')
        );

        if (isset($this->data['merchant_referring_name'])) $data['merchant_referring_name'] = $this->getField('merchant_referring_name');
        if (isset($this->data['customer_id'])) $data['customer_id'] = $this->getField('customer_id');
        if (isset($this->data['check_saved_card'])) $data['check_saved_card'] = $this->getField('check_saved_card');

        return $data;
    }

    protected function checkData()
    {
        $this->checkMandatoryField('rs');
        $this->checkMandatoryField('original_init_id');
        $this->checkMandatoryField('merchant_transaction_id');
        $this->checkMandatoryField('amount');
    }
}
