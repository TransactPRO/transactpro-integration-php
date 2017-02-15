<?php

namespace TransactPRO\Gate\Builders;

class AccessDataBuilder extends Builder
{
    /**
     * Builder index's
     */
    const API_URL = 'apiUrl';
    const GUID = 'guid';
    const PASSWORD = 'pwd';
    const VERIFY_SSL = 'verifySSL';

    /**
     * Builds default structure
     *
     * @return array
     */
    public function build()
    {
        return array(
            self::API_URL    => $this->getField(self::API_URL),
            self::GUID       => $this->getField(self::GUID),
            self::PASSWORD   => sha1($this->getField(self::PASSWORD)),
            self::VERIFY_SSL => $this->getField(self::VERIFY_SSL, true),
        );
    }

    /**
     * Check Access Data Builder mandatory fields
     *
     * @throws \TransactPRO\Gate\Exceptions\MissingFieldException
     */
    protected function checkData()
    {
        $this->checkMandatoryField(self::API_URL);
        $this->checkMandatoryField(self::GUID);
        $this->checkMandatoryField(self::PASSWORD);
    }
}