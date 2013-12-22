<?php

namespace TransactPRO\Gate\tests\Builders;

use TransactPRO\Gate\Builders\AccessDataBuilder;
use TransactPRO\Gate\Exceptions\MissingFieldException;

class AccessDataBuilderTest extends \PHPUnit_Framework_TestCase
{
    /** @var array */
    private $accessData;
    /** @var array */
    private $buildAccessData;

    public function setUp()
    {
        $this->accessData      = array(
            'apiUrl'    => 'https://www.payment-api.com',
            'guid'      => 'AAAA-AAAA-AAAA-AAAA',
            'pwd'       => '111',
            'verifySSL' => true
        );
        $this->buildAccessData = array(
            'apiUrl'    => 'https://www.payment-api.com',
            'guid'      => 'AAAA-AAAA-AAAA-AAAA',
            'pwd'       => sha1('111'),
            'verifySSL' => true
        );
    }

    public function testCanBuildSuccessfullyWithValidData()
    {
        $builder = new AccessDataBuilder($this->accessData);
        $this->assertEquals($this->buildAccessData, $builder->build());
    }

    public function testEncryptPasswordWithSHA1()
    {
        $builder         = new AccessDataBuilder($this->accessData);
        $buildAccessData = $builder->build();
        $this->assertEquals($this->buildAccessData['pwd'], $buildAccessData['pwd']);
    }

    /**
     * @expectedException \TransactPRO\Gate\Exceptions\MissingFieldException
     * @dataProvider getMandatoryFields
     */
    public function testMandatoryFields($field)
    {
        $accessData = $this->accessData;
        unset($accessData[$field]);
        new AccessDataBuilder($accessData);
    }

    public function getMandatoryFields()
    {
        return array(
            array('apiUrl'),
            array('guid'),
            array('pwd')
        );
    }

    public function testVerifySslFieldAreOptional()
    {
        $accessData = $this->accessData;
        unset($accessData['verifySSL']);
        $builder = new AccessDataBuilder($accessData);

        $this->assertEquals($this->buildAccessData, $builder->build());
    }
}
 