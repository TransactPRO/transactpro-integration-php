<?php

namespace tests\TransactPRO\Gate\Builders;

class InitP2PDataBuilderTest extends BuilderTestCase
{
    public function setUp()
    {
        $this->builderClass     = 'TransactPRO\Gate\Builders\InitP2PDataBuilder';
        $this->data             = array(
            'rs'                      => 'AAAA',
            'merchant_transaction_id' => microtime(true),
            'user_ip'                 => '127.0.0.1',
            'description'             => 'Test description',
            'amount'                  => '100',
            'currency'                => 'LVL',
            'name_on_card'            => 'Vasyly Pupkin',
            'street'                  => 'Main street 1',
            'zip'                     => 'LV-0000',
            'city'                    => 'Riga',
            'country'                 => 'LV',
            'state'                   => 'NA',
            'email'                   => 'email@example.lv',
            'phone'                   => '+371 11111111',
            'card_bin'                => '511111',
            'bin_name'                => 'BANK',
            'bin_phone'               => '+371 11111111',
            'merchant_site_url'       => 'http://www.example.com',
            'save_card'               => '1',
            'cardname'                => 'John DoE',
            'recipient_name'          => 'JOHN DOE',
            'client_birth_date'       => '06161981',
        );
        $this->buildData        = $this->data;
    }

    public function getMandatoryFields()
    {
        return array(
            array('rs'),
            array('merchant_transaction_id'),
            array('description'),
            array('amount'),
            array('currency'),
            array('name_on_card'),
            array('phone'),
            array('cardname'),
            array('recipient_name'),
            array('client_birth_date'),
        );
    }

    public function getNonMandatoryFields()
    {
        return array(
            array('user_ip', '127.0.0.1'),
            array('state', 'NA'),
            array('card_bin', ''),
            array('bin_name', ''),
            array('bin_phone', ''),
        );
    }
}
