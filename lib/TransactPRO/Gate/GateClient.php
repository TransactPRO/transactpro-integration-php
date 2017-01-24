<?php

namespace TransactPRO\Gate;

use TransactPRO\Gate\Builders\Builder;
use TransactPRO\Gate\Builders\CancelDmsDataBuilder;
use TransactPRO\Gate\Builders\ChargeDataBuilder;
use TransactPRO\Gate\Builders\ChargeHoldDataBuilder;
use TransactPRO\Gate\Builders\ChargeRecurrentDataBuilder;
use TransactPRO\Gate\Builders\InitDataBuilder;
use TransactPRO\Gate\Builders\InitDmsDataBuilder;
use TransactPRO\Gate\Builders\InitP2PDataBuilder;
use TransactPRO\Gate\Builders\InitCreditDataBuilder;
use TransactPRO\Gate\Builders\DoP2PDataBuilder;
use TransactPRO\Gate\Builders\DoCreditDataBuilder;
use TransactPRO\Gate\Builders\InitRecurrentDataBuilder;
use TransactPRO\Gate\Builders\MakeHoldDataBuilder;
use TransactPRO\Gate\Builders\RefundDataBuilder;
use TransactPRO\Gate\Builders\StatusRequestDataBuilder;
use TransactPRO\Gate\Builders\AccessDataBuilder;
use TransactPRO\Gate\Builders\StatusRequestDataBuilderMerchantID;
use TransactPRO\Gate\Request\RequestExecutor;
use TransactPRO\Gate\Request\RequestExecutorInterface;

/**
 * @package TransactPRO\Gate
 */
class GateClient
{
    /** @var array */
    private $accessData;
    /** @var RequestExecutorInterface */
    private $requestExecutor;

    /**
     * @param array $accessData
     * @param RequestExecutorInterface $requestExecutor
     */
    function __construct(array $accessData, RequestExecutorInterface $requestExecutor = null)
    {
        $accessDataBuilder     = new AccessDataBuilder($accessData);
        $this->accessData      = $accessDataBuilder->build();
        $this->requestExecutor = $requestExecutor ? $requestExecutor : new RequestExecutor($this->accessData['apiUrl'], $this->accessData['verifySSL']);
    }

    /**
     * @return array
     */
    public function getAccessData()
    {
        return $this->accessData;
    }

    /**
     * @return RequestExecutorInterface
     */
    public function getRequestExecutor()
    {
        return $this->requestExecutor;
    }

    public function init(array $data)
    {
        $buildData = $this->buildData(new InitDataBuilder($data));
        $response  = $this->requestExecutor->executeRequest('init', $buildData);

        return $response;
    }

    public function charge(array $data)
    {
        $buildData = $this->buildData(new ChargeDataBuilder($data));
        $response  = $this->requestExecutor->executeRequest('charge', $buildData);

        return $response;
    }

    public function initDms(array $data)
    {
        $buildData = $this->buildData(new InitDmsDataBuilder($data));
        $response  = $this->requestExecutor->executeRequest('init_dms', $buildData);

        return $response;
    }

    public function makeHold(array $data)
    {
        $buildData = $this->buildData(new MakeHoldDataBuilder($data));
        $response  = $this->requestExecutor->executeRequest('make_hold', $buildData);

        return $response;
    }

    public function chargeHold(array $data)
    {
        $buildData = $this->buildData(new ChargeHoldDataBuilder($data));
        $response  = $this->requestExecutor->executeRequest('charge_hold', $buildData);

        return $response;
    }

    public function cancelDms(array $data)
    {
        $buildData = $this->buildData(new CancelDmsDataBuilder($data));
        $response  = $this->requestExecutor->executeRequest('cancel_dms', $buildData);

        return $response;
    }

    public function refund(array $data)
    {
        $buildData = $this->buildData(new RefundDataBuilder($data));
        $response  = $this->requestExecutor->executeRequest('refund', $buildData);

        return $response;
    }

    public function statusRequest(array $data)
    {
        $buildData = $this->buildData(new StatusRequestDataBuilder($data));
        $response  = $this->requestExecutor->executeRequest('status_request', $buildData);

        return $response;
    }

    public function statusRequestMerchantID(array $data) {

        $buildData = $this->buildData(new StatusRequestDataBuilderMerchantID($data));
        $response  = $this->requestExecutor->executeRequest('status_request', $buildData);

        return $response;

    }

    public function initP2P(array $data)
    {
        $buildData = $this->buildData(new InitP2PDataBuilder($data));
        $response  = $this->requestExecutor->executeRequest('init_p2p', $buildData);

        return $response;
    }

    public function doP2P(array $data)
    {
        $buildData = $this->buildData(new DoP2PDataBuilder($data));
        $response  = $this->requestExecutor->executeRequest('do_p2p', $buildData);

        return $response;
    }

    public function initCredit(array $data)
    {
        $buildData = $this->buildData(new InitCreditDataBuilder($data));
        $response  = $this->requestExecutor->executeRequest('init_credit', $buildData);

        return $response;
    }

    public function doCredit(array $data)
    {
        $buildData = $this->buildData(new DoCreditDataBuilder($data));
        $response  = $this->requestExecutor->executeRequest('do_credit', $buildData);

        return $response;
    }

    public function initRecurrent(array $data)
    {
        $buildData = $this->buildData(new InitRecurrentDataBuilder($data));
        $response  = $this->requestExecutor->executeRequest('init_recurrent', $buildData);

        return $response;
    }

    public function chargeRecurrent(array $data)
    {
        $buildData = $this->buildData(new ChargeRecurrentDataBuilder($data));
        $response  = $this->requestExecutor->executeRequest('charge_recurrent', $buildData);

        return $response;
    }

    private function buildData(Builder $builder)
    {
        $buildData                 = $builder->build();
        $buildData['guid']         = $this->accessData['guid'];
        $buildData['account_guid'] = $this->accessData['guid'];
        $buildData['pwd']          = $this->accessData['pwd'];

        return $buildData;
    }
}
