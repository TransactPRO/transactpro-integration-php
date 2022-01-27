<?php

namespace tests\TransactPRO\Gate\Builders;

class ChargeDataBuilderTest extends BuilderTestCase
{
    protected function setUp()
    {
        $this->builderClass = 'TransactPRO\Gate\Builders\ChargeDataBuilder';
        $this->data         = array(
            'f_extended'                => '5',
            'init_transaction_id'       => '13hpf5rp1e0ss72dypjnhalzn1wmrkfmsjtwzocg',
            'cc'                        => '5111111111111111',
            'cvv'                       => '111',
            'expire'                    => '01/20',
            'merchant_referring_url'    => 'http://www.paymentform.example.com',
            'browser_accept_header'       => "text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8",
            'browser_java_enabled'        => true,
            'browser_javascript_enabled'  => true,
            'browser_language'            => "en-US",
            'browser_color_depth'         => "24",
            'browser_screen_height'       => "1080",
            'browser_screen_width'        => "1920",
            'browser_tz'                  => "-180" ,
            'browser_user_agent'          => "Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:47.0) Gecko/20100101 Firefox/47.0",
        );
        $this->buildData    = $this->data;
    }

    public function getMandatoryFields()
    {
        return array(
            array('init_transaction_id'),
        );
    }

    public function getNonMandatoryFields()
    {
        return array(
            array('f_extended', 5),
            array('merchant_referring_url'),
        );
    }
}
 
