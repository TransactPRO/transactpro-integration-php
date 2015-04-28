<?php

namespace TransactPRO\Gate\Builders;

class StatusRequestDataBuilderMerchantID extends Builder
{
    public function build()
    {
        return array(
            'request_type'        => $this->getField('request_type', 'transaction_status'),
            'merchant_transaction_id' => $this->getField('merchant_transaction_id'),
            'f_extended'          => $this->getField('f_extended', '5')
        );
    }

    protected function checkData()
    {
        $this->checkMandatoryField('merchant_transaction_id');
    }
}