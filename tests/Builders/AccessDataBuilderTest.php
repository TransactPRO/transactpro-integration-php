<?php

namespace TransactPRO\Gate\tests\Builders;

use TransactPRO\Gate\Builders\AccessDataBuilder;

class AccessDataBuilderTest extends BuilderTestCase
{
    public function setUp()
    {
        $this->builderClass = 'TransactPRO\Gate\Builders\AccessDataBuilder';
        $this->data      = array(
            'apiUrl'    => 'https://www.payment-api.com',
            'guid'      => 'AAAA-AAAA-AAAA-AAAA',
            'pwd'       => '111',
            'verifySSL' => true
        );
        $this->buildData = array(
            'apiUrl'    => 'https://www.payment-api.com',
            'guid'      => 'AAAA-AAAA-AAAA-AAAA',
            'pwd'       => sha1('111'),
            'verifySSL' => true
        );
    }

    public function testCanBuildSuccessfullyWithValidData()
    {
        $this->assertBuilderCanBeBuild();
    }

    public function testEncryptPasswordWithSHA1()
    {
        $builder         = new AccessDataBuilder($this->data);
        $buildAccessData = $builder->build();
        $this->assertEquals($this->buildData['pwd'], $buildAccessData['pwd']);
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
            array('apiUrl'),
            array('guid'),
            array('pwd')
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
            array('verifySSL', true),
        );
    }
}
 