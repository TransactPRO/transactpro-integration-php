<?php
/**
 * Created by Transact Pro
 * Date: 7/3/15
 * Time: 11:42 AM
 */

namespace TransactPRO\Gate\Builders;


class ChargeB2PDataBuilder extends ChargeDataBuilder
{
    public function build()
    {
        return array(
            'f_extended'          => $this->getField('f_extended', 5),
            'init_transaction_id' => $this->getField('init_transaction_id'),
            'cc_2'                => $this->getField('cc_2'),
            'expire2'             => $this->getField('expire2'),
        );
    }

    protected function checkData()
    {
        $this->checkMandatoryField('init_transaction_id');
        $this->checkMandatoryField('cc_2');
    }
}