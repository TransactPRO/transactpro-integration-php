<?php

namespace TransactPRO\Gate\Builders;

use TransactPRO\Gate\Exceptions\MissingFieldException;

class AccessDataBuilder implements BuilderInterface
{
    /** @var array */
    private $accessData;

    function __construct(array $accessData)
    {
        $this->accessData = $accessData;
        $this->checkMandatoryFields($accessData);
    }

    /**
     * Build request data.
     * @return array
     */
    public function build()
    {
        $buildAccessData = array(
            'apiUrl'    => $this->accessData['apiUrl'],
            'guid'      => $this->accessData['guid'],
            'pwd'       => sha1($this->accessData['pwd']),
            'verifySSL' => isset($this->accessData['verifySSL']) ? $this->accessData['verifySSL'] : true
        );

        return $buildAccessData;
    }

    private function checkMandatoryFields($accessData)
    {
        if (!isset($accessData['apiUrl'])) throw new MissingFieldException;
        if (!isset($accessData['guid'])) throw new MissingFieldException;
        if (!isset($accessData['pwd'])) throw new MissingFieldException;
    }
}