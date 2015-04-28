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
     * @param int $responseStatus
     * @param string $responseContent
     */
    function __construct($responseStatus, $responseContent)
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
        return $this->responseStatus == self::STATUS_SUCCESS;
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
     * @return array
     */
    public function getParsedResponse()
    {
        if ($this->getResponseStatus() == self::STATUS_ERROR) return array();

        $parsedResponse = array();
        $keyValuePairs  = explode("~", $this->responseContent);
        foreach ($keyValuePairs as $keyValuePair) {
            $keyValue                     = explode(":", $keyValuePair, 2);
            $parsedResponse[$keyValue[0]] = isset($keyValue[1]) ? $keyValue[1] : '';
        }

        return $parsedResponse;
    }

    /**
     * @return bool
     */
    public function getTransactionStatus() {

        $parsedResponse = $this->getParsedResponse();

        if( !$parsedResponse['Status'] ) {
            return false;
        }

        if( $parsedResponse['Status'] == 'Success' ) {
            return true;
        } else {
            return false;
        }

    }

}