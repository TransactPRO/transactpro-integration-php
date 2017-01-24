<?php

namespace TransactPRO\Gate\Builders;

class InitP2PDataBuilder extends InitDataBuilder
{
    public function build()
    {
        return array(
            'rs'                      => $this->getField('rs'),
            'merchant_transaction_id' => $this->getField('merchant_transaction_id'),
            'user_ip'                 => $this->getField('user_ip', $this->getRemoteAddress()),
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
            'save_card'               => $this->getField('save_card'),
            'cardname'                => $this->getField('cardname'),
            'recipient_name'          => $this->getField('recipient_name'),
            'client_birth_date'       => $this->getField('client_birth_date'),
        );
    }

    protected function checkData()
    {
        $this->checkMandatoryField('rs');
        $this->checkMandatoryField('merchant_transaction_id');
        $this->checkMandatoryField('description');
        $this->checkMandatoryField('amount');
        $this->checkMandatoryField('currency');
        $this->checkMandatoryField('name_on_card');
        $this->checkMandatoryField('phone');
        $this->checkMandatoryField('merchant_site_url');
        $this->checkMandatoryField('cardname');
        $this->checkMandatoryField('recipient_name');
        $this->checkMandatoryField('client_birth_date');
    }
}
