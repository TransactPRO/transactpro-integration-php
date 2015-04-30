<?php

namespace TransactPRO\Gate\Request;

use TransactPRO\Gate\Response\Response;

class RequestExecutor implements RequestExecutorInterface
{
    /** @var string */
    private $url;
    /** @var bool */
    private $verifySSL;

    /**
     * @param string $url Gateway url
     * @param bool $verifySSL
     */
    public function __construct($url, $verifySSL = false)
    {
        $this->url       = $url;
        $this->verifySSL = $verifySSL;
    }

    /**
     * @param string $action Action to be executed
     * @param array $postData Data for sending
     * @return Response
     */
    public function executeRequest($action, array $postData)
    {
        $ch  = curl_init();
        $url = $this->constructApiUrl($action);

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FAILONERROR, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_POST, 1);
        
        if ($this->verifySSL) {
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
        } else {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        }
        
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));

        $curlResult = curl_exec($ch);
        $curlStatus = Response::STATUS_SUCCESS;
        if (!$curlResult) {
            $curlStatus = Response::STATUS_ERROR;
            $curlResult = curl_error($ch);
        }
        curl_close($ch);

        return new Response($curlStatus, $curlResult);
    }

    /**
     * Construct full URL, for action executing.
     * @param string $action
     * @return string
     */
    private function constructApiUrl($action)
    {
        return $this->url . '/gwprocessor2.php?a=' . $action;
    }
}
