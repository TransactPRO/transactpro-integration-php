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
    const STATUS_ERROR   = 'error';

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
} 