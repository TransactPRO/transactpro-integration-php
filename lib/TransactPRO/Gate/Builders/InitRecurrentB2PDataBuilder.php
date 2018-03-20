<?php
/**
 * Created by PhpStorm.
 * User: olga
 * Date: 2/9/15
 * Time: 6:32 PM
 */

namespace TransactPRO\Gate\Builders;


class InitRecurrentB2PDataBuilder extends Builder
{
    public function build()
    {
        return array(
            'original_init_id'        => $this->getField('original_init_id'),
            'merchant_transaction_id' => $this->getField('merchant_transaction_id'),
            'rs'                      => $this->getField('rs'),
            'amount'                  => $this->getField('amount'),
            'description'             => $this->getField('description'),
            'check_saved_card'        => $this->getField('check_saved_card'),
            'customer_id'             => $this->getField('customer_id'),
            'client_birth_date'       => $this->getField('client_birth_date'),
            'name_on_card'            => $this->getField('name_on_card'),
            'city'                    => $this->getField('city'),
            'country'                 => $this->getField('country'),
        );
    }

    protected function checkData()
    {
        $this->checkMandatoryField('original_init_id');
        $this->checkMandatoryField('merchant_transaction_id');
        $this->checkMandatoryField('rs');
        $this->checkMandatoryField('amount');
    }
} 