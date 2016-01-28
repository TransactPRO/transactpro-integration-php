<?php

namespace TransactPRO\Gate\Builders;

class StatusRequestDataBuilder extends Builder
{
    public function build()
    {
        $dataArray = array(
            'request_type' => $this->getField('request_type', 'transaction_status'),
            'f_extended'   => $this->getField('f_extended', '5')
        );

        $initTransactionID = $this->getField('init_transaction_id');
        if (!empty($initTransactionID)) {
            $dataArray['init_transaction_id'] = $initTransactionID;
        }

        $merchantTransactionID = $this->getField('merchant_transaction_id');
        if (!empty($merchantTransactionID)) {
            $dataArray['merchant_transaction_id'] = $merchantTransactionID;
        }
        return $dataArray;
    }
    
    
    protected function checkData()
    {
        $this->checkMandatoryField('init_transaction_id');
    }
}
