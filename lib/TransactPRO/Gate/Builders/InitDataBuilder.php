<?php

namespace TransactPRO\Gate\Builders;

class InitDataBuilder extends Builder
{
    public function build()
    {
        return array(
            'rs'                      => $this->getField('rs'),
            'merchant_transaction_id' => $this->getField('merchant_transaction_id'),
            'user_ip'                 => $this->getField('user_ip', $_SERVER['REMOTE_ADDR']),
            'description'             => $this->getField('description'),
            'amount'                  => $this->getField('amount'),
            'currency'                => $this->getField('currency'),
            'name_on_card'            => $this->getField('name_on_card'),
            'street'                  => $this->getField('street'),
            'zip'                     => $this->getField('zip'),
            'city'                    => $this->getField('city'),
            'country'                 => $this->getField('country'),
            'state'                   => $this->getField('state', 'NA'),
            'email'                   => $this->getField('email'),
            'phone'                   => $this->getField('phone'),
            'card_bin'                => $this->getField('card_bin'),
            'bin_name'                => $this->getField('bin_name'),
            'bin_phone'               => $this->getField('bin_phone'),
            'merchant_site_url'       => $this->getField('merchant_site_url'),
        );
    }

    protected function checkData(array $data)
    {
        $this->checkMandatoryField($data, 'rs');
        $this->checkMandatoryField($data, 'merchant_transaction_id');
        $this->checkMandatoryField($data, 'description');
        $this->checkMandatoryField($data, 'amount');
        $this->checkMandatoryField($data, 'currency');
        $this->checkMandatoryField($data, 'name_on_card');
        $this->checkMandatoryField($data, 'street');
        $this->checkMandatoryField($data, 'zip');
        $this->checkMandatoryField($data, 'city');
        $this->checkMandatoryField($data, 'country');
        $this->checkMandatoryField($data, 'phone');
        $this->checkMandatoryField($data, 'merchant_site_url');
    }
}