<?php

namespace TransactPRO\Gate\Builders;

use TransactPRO\Gate\Exceptions\MissingFieldException;

abstract class Builder
{
    /** @var array */
    protected $data;

    final function __construct(array $data)
    {
        $this->data = $data;
        $this->checkData($data);
    }

    /**
     * Build request data.
     * @return array
     */
    abstract public function build();

    /**
     * Run check on passed data.
     * @param array $data
     */
    abstract protected function checkData(array $data);

    /**
     * Check field presence in array.
     * @param array $data
     * @param string $field
     * @throws MissingFieldException
     */
    protected function checkMandatoryField(array $data, $field)
    {
        if (!isset($data[$field])) throw new MissingFieldException("Field '$field' are mandatory.");
    }
} 