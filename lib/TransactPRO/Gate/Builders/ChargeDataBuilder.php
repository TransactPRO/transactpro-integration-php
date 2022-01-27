<?php

namespace TransactPRO\Gate\Builders;

class ChargeDataBuilder extends Builder
{
    public function build()
    {
        return array(
            'f_extended'                  => $this->getField('f_extended', 5),
            'init_transaction_id'         => $this->getField('init_transaction_id'),
            'cc'                          => $this->getField('cc'),
            'cvv'                         => $this->getField('cvv'),
            'expire'                      => $this->getField('expire'),
            'merchant_referring_url'      => $this->getField('merchant_referring_url'),
            'browser_accept_header'       => $this->getField('browser_accept_header'),
            'browser_java_enabled'        => $this->getField('browser_java_enabled'),
            'browser_javascript_enabled'  => $this->getField('browser_javascript_enabled'),
            'browser_language'            => $this->getField('browser_language'),
            'browser_color_depth'         => $this->getField('browser_color_depth'),
            'browser_screen_height'       => $this->getField('browser_screen_height'),
            'browser_screen_width'        => $this->getField('browser_screen_width'),
            'browser_tz'                  => $this->getField('browser_tz'),
            'browser_user_agent'          => $this->getField('browser_user_agent'),
        );
    }

    protected function checkData()
    {
        $this->checkMandatoryField('init_transaction_id');
    }
}
