<?php

namespace TransactPRO\Gate\tests\Builders;

use TransactPRO\Gate\Builders\Builder;

class BuilderTestCase extends \PHPUnit_Framework_TestCase
{
    /** @var array */
    protected $data;
    /** @var array */
    protected $buildData;
    /** @var string */
    protected $builderClass;

    public function assertBuilderCanBeBuild()
    {
        /** @var Builder $builder */
        $builder = new $this->builderClass($this->data);
        $this->assertEquals($this->buildData, $builder->build());
    }

    public function assertMandatoryField($field)
    {
        $this->setExpectedException('\TransactPRO\Gate\Exceptions\MissingFieldException');
        $data = $this->data;
        unset($data[$field]);
        new $this->builderClass($data);
    }

    public function assertNonMandatoryField($field, $expectedFieldValue)
    {
        $data = $this->data;
        unset($data[$field]);
        /** @var Builder $builder */
        $builder   = new $this->builderClass($data);
        $buildData = $builder->build();
        $this->assertEquals($expectedFieldValue, $buildData[$field]);
    }
} 