<?php

namespace TransactPRO\Gate\Builders;

use TransactPRO\Gate\Exceptions\MissingFieldException;

abstract class Builder
{
    /** @var array */
    protected $data;

    /**
     * Builder constructor.
     *
     * @param array $data
     */
    public final function __construct(array $data)
    {
        $this->data = $data;
        $this->checkData();
    }

    /**
     * Build request data.
     * @return array
     */
    abstract public function build();

    /**
     * Run check on passed data.
     */
    abstract protected function checkData();

    /**
     * Check field presence in array.
     * @param string $field
     * @throws MissingFieldException
     */
    protected function checkMandatoryField($field)
    {
        if (!isset($this->data[$field])) throw new MissingFieldException("Field '$field' are mandatory.");
    }

    protected function getField($fieldName, $defaultValue = '')
    {
        return isset($this->data[$fieldName]) ? $this->data[$fieldName] : $defaultValue;
    }
} 