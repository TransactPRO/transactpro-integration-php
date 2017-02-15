<?php

namespace TransactPRO\Gate\Response;

/**
 * @package TransactPRO\Gate\Response
 */
class Response
{
    /** Indicates that response are successful. */
    const STATUS_SUCCESS = 'success';
    /** Indicates that response are unsuccessful and contain error. */
    const STATUS_ERROR = 'error';

    /** @var int */
    private $responseStatus;
    /** @var string */
    private $responseContent;

    /**
     * @param int    $responseStatus
     * @param string $responseContent
     */
    public function __construct($responseStatus, $responseContent)
    {
        switch ($responseStatus) {
            case self::STATUS_SUCCESS:
                $this->responseStatus = self::STATUS_SUCCESS;
                break;
            case self::STATUS_ERROR:
            default:
                $this->responseStatus = self::STATUS_ERROR;
                break;
        }

        $this->responseContent = $responseContent;
    }

    /**
     * @return bool
     */
    public function isSuccessful()
    {
        return $this->responseStatus === self::STATUS_SUCCESS;
    }

    /**
     * @return string
     */
    public function getResponseContent()
    {
        return $this->responseContent;
    }

    /**
     * @return int
     */
    public function getResponseStatus()
    {
        return $this->responseStatus;
    }

    /**
     * Get parsed response of operation
     *
     * @return array
     */
    public function getParsedResponse()
    {
        $parsedResponse = [];

        if ($this->getResponseStatus() !== self::STATUS_ERROR) {
            $parsedResponse = array();
            $keyValuePairs = explode('~', $this->responseContent);

            foreach ($keyValuePairs as $keyValuePair) {
                $keyValue = explode(':', $keyValuePair, 2);
                $parsedResponse[ $keyValue[0] ] = isset($keyValue[1]) ? $keyValue[1] : '';
            }
        }

        return $parsedResponse;
    }

    /**
     * Is transaction successful
     *
     * @return bool true|false
     */
    public function getTransactionStatus()
    {
        $parsedResponse = $this->getParsedResponse();

        return isset($parsedResponse['Status']) && $parsedResponse['Status'] === 'Success';
    }

}
