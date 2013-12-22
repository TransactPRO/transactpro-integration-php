<?php

namespace TransactPRO\Gate\tests\Builders;

use TransactPRO\Gate\Builders\InitDataBuilder;

class InitDataBuilderTest extends BuilderTestCase
{
    public function setUp()
    {
        $_SERVER['REMOTE_ADDR']  = '127.0.0.1';
        $merchant_transaction_id = microtime(true);
        $this->builderClass = 'TransactPRO\Gate\Builders\InitDataBuilder';
        $this->data              = array(
            'rs'                      => 'AAAA',
            'merchant_transaction_id' => $merchant_transaction_id,
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
            'merchant_site_url'       => 'http://www.example.com'
        );
        $this->buildData         = array(
            'rs'                      => 'AAAA',
            'merchant_transaction_id' => $merchant_transaction_id,
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
            'merchant_site_url'       => 'http://www.example.com'
        );
    }

    public function testCanBuildSuccessfullyWithValidData()
    {
        $this->assertBuilderCanBeBuild();
    }

    /**
     * @dataProvider getMandatoryFields
     */
    public function testMandatoryFields($field)
    {
        $this->assertMandatoryField($field);
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
            array('street'),
            array('zip'),
            array('city'),
            array('country'),
            array('phone'),
            array('merchant_site_url')
        );
    }

    /**
     * @dataProvider getNonMandatoryFields
     */
    public function testNonMandatoryFields($field, $expectedFieldValue)
    {
        $this->assertNonMandatoryField($field, $expectedFieldValue);
    }

    public function getNonMandatoryFields()
    {
        return array(
            array('user_ip', '127.0.0.1'),
            array('state', 'NA'),
            array('card_bin', ''),
            array('bin_name', ''),
            array('bin_phone', '')
        );
    }

}
 