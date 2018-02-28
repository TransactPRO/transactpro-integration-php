<?php
/**
 * Created by Transact Pro
 * Date: 7/3/15
 * Time: 11:42 AM
 */

namespace TransactPRO\Gate\Builders;


class InitB2PDataBuilder extends InitDataBuilder
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
            'save_card'               => $this->getField('save_card'),
            'client_birth_date'       => $this->getField('client_birth_date'),
            'customer_id'             => $this->getField('customer_id'),
            'check_saved_card'        => $this->getField('check_saved_card'),
            'merchant_referring_name' => $this->getField('merchant_referring_name'),
        );
    }
}