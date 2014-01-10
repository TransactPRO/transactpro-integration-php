<?php

namespace tests\TransactPRO\Gate\Builders;

use TransactPRO\Gate\Builders\AccessDataBuilder;

class AccessDataBuilderTest extends BuilderTestCase
{
    public function setUp()
    {
        $this->builderClass = 'TransactPRO\Gate\Builders\AccessDataBuilder';
        $this->data         = array(
            'apiUrl'    => 'https://www.payment-api.com',
            'guid'      => 'AAAA-AAAA-AAAA-AAAA',
            'pwd'       => '111',
            'verifySSL' => true
        );
        $this->buildData    = array(
            'apiUrl'    => 'https://www.payment-api.com',
            'guid'      => 'AAAA-AAAA-AAAA-AAAA',
            'pwd'       => sha1('111'),
            'verifySSL' => true
        );
    }

    public function testEncryptPasswordWithSHA1()
    {
        $builder         = new AccessDataBuilder($this->data);
        $buildAccessData = $builder->build();
        $this->assertEquals($this->buildData['pwd'], $buildAccessData['pwd']);
    }

    public function getMandatoryFields()
    {
        return array(
            array('apiUrl'),
            array('guid'),
            array('pwd')
        );
    }

    public function getNonMandatoryFields()
    {
        return array(
            array('verifySSL', true),
        );
    }
}
 