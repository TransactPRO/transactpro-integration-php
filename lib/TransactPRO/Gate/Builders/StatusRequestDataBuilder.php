<?php

namespace TransactPRO\Gate\Builders;

class StatusRequestDataBuilder extends Builder
{
    public function build()
    {
        return array(
            'request_type'        => $this->getField('request_type', 'transaction_status'),
            'init_transaction_id' => $this->getField('init_transaction_id'),
            'f_extended'          => $this->getField('f_extended', '5')
        );
    }

    protected function checkData()
    {
        $this->checkMandatoryField('init_transaction_id');
    }
}