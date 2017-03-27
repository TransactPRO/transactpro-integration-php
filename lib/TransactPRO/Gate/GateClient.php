<?php

namespace TransactPRO\Gate;

use TransactPRO\Gate\Builders\Builder;
use TransactPRO\Gate\Builders\CancelDmsDataBuilder;
use TransactPRO\Gate\Builders\ChargeDataBuilder;
use TransactPRO\Gate\Builders\ChargeHoldDataBuilder;
use TransactPRO\Gate\Builders\ChargeRecurrentDataBuilder;
use TransactPRO\Gate\Builders\DoRecurrentCreditDataBuilder;
use TransactPRO\Gate\Builders\DoRecurrentP2PDataBuilder;
use TransactPRO\Gate\Builders\InitDataBuilder;
use TransactPRO\Gate\Builders\InitDmsDataBuilder;
use TransactPRO\Gate\Builders\InitP2PDataBuilder;
use TransactPRO\Gate\Builders\InitCreditDataBuilder;
use TransactPRO\Gate\Builders\DoP2PDataBuilder;
use TransactPRO\Gate\Builders\DoCreditDataBuilder;
use TransactPRO\Gate\Builders\InitRecurrentCreditDataBuilder;
use TransactPRO\Gate\Builders\InitRecurrentDataBuilder;
use TransactPRO\Gate\Builders\InitRecurrentP2PDataBuilder;
use TransactPRO\Gate\Builders\MakeHoldDataBuilder;
use TransactPRO\Gate\Builders\RefundDataBuilder;
use TransactPRO\Gate\Builders\StatusRequestDataBuilder;
use TransactPRO\Gate\Builders\AccessDataBuilder;
use TransactPRO\Gate\Builders\StatusRequestDataBuilderMerchantID;
use TransactPRO\Gate\Request\RequestExecutor;
use TransactPRO\Gate\Request\RequestExecutorInterface;

/**
 * Basic client of TransactPRO Gateway API
 *
 * @package TransactPRO\Gate
 */
class GateClient
{
    /**
     * @var array
     */
    private $accessData;

    /**
     * @var RequestExecutor
     */
    private $requestExecutor;

    /**
     * GateClient constructor.
     *
     * @param array                         $accessData
     * @param RequestExecutorInterface|null $requestExecutor
     */
    public function __construct(array $accessData, RequestExecutorInterface $requestExecutor = null)
    {
        $accessDataBuilder     = new AccessDataBuilder($accessData);
        $this->accessData      = $accessDataBuilder->build();
        $this->requestExecutor = $requestExecutor ? : new RequestExecutor($this->accessData['apiUrl'], $this->accessData['verifySSL']);
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

    /**
     * @docReference 2.2 INITIALIZING A TRANSACTION
     *
     * @param array $data
     *
     * @return Response\Response
     */
    public function init(array $data)
    {
        $buildData = $this->buildData(new InitDataBuilder($data));

        return $this->requestExecutor->executeRequest('init', $buildData);
    }

    /**
     * @docReference 2.4 COMPLETING A TRANSACTION
     *
     * @param array $data
     *
     * @return Response\Response
     */
    public function charge(array $data)
    {
        $buildData = $this->buildData(new ChargeDataBuilder($data));

        return $this->requestExecutor->executeRequest('charge', $buildData);
    }

    /**
     * @docReference 3.2 DUAL MESSAGE TRANSACTION
     *
     * @param array $data
     *
     * @return Response\Response
     */
    public function initDms(array $data)
    {
        $buildData = $this->buildData(new InitDmsDataBuilder($data));

        return $this->requestExecutor->executeRequest('init_dms', $buildData);
    }

    /**
     * @docReference 3.2 DUAL MESSAGE TRANSACTION
     *
     * @param array $data
     *
     * @return Response\Response
     */
    public function makeHold(array $data)
    {
        $buildData = $this->buildData(new MakeHoldDataBuilder($data));

        return $this->requestExecutor->executeRequest('make_hold', $buildData);
    }

    /**
     * @docReference 3.2 DUAL MESSAGE TRANSACTION
     *
     * @param array $data
     *
     * @return Response\Response
     */
    public function chargeHold(array $data)
    {
        $buildData = $this->buildData(new ChargeHoldDataBuilder($data));

        return $this->requestExecutor->executeRequest('charge_hold', $buildData);
    }

    /**
     * @docReference 3.2.1 HOW TO CANCEL DMS HOLD WITHOUT REFUNDS
     *
     * @param array $data
     *
     * @return Response\Response
     */
    public function cancelDms(array $data)
    {
        $buildData = $this->buildData(new CancelDmsDataBuilder($data));

        return $this->requestExecutor->executeRequest('cancel_dms', $buildData);
    }

    /**
     * @docReference 2.6 REFUNDS
     *
     * @param array $data
     *
     * @return Response\Response
     */
    public function refund(array $data)
    {
        $buildData = $this->buildData(new RefundDataBuilder($data));

        return $this->requestExecutor->executeRequest('refund', $buildData);
    }

    /**
     * @docReference 2.5.1 REQUESTING TRANSACTION STATUS
     *
     * @param array $data
     *
     * @return Response\Response
     */
    public function statusRequest(array $data)
    {
        $buildData = $this->buildData(new StatusRequestDataBuilder($data));

        return $this->requestExecutor->executeRequest('status_request', $buildData);
    }

    /**
     * @docReference 2.5.1 REQUESTING TRANSACTION STATUS
     *
     * @param array $data
     *
     * @return Response\Response
     */
    public function statusRequestMerchantID(array $data)
    {

        $buildData = $this->buildData(new StatusRequestDataBuilderMerchantID($data));

        return $this->requestExecutor->executeRequest('status_request', $buildData);

    }

    /**
     * @docReference 2.1.9 P2P TRANSACTIONS
     *
     * @param array $data
     *
     * @return Response\Response
     */
    public function initP2P(array $data)
    {
        $buildData = $this->buildData(new InitP2PDataBuilder($data));

        return $this->requestExecutor->executeRequest('init_p2p', $buildData);
    }

    /**
     * @docReference 2.1.9 P2P TRANSACTIONS
     *
     * @param array $data
     *
     * @return Response\Response
     */
    public function doP2P(array $data)
    {
        $buildData = $this->buildData(new DoP2PDataBuilder($data));

        return $this->requestExecutor->executeRequest('do_p2p', $buildData);
    }

    /**
     * @docReference 2.1.7 CREDIT TRANSACTIONS
     *
     * @param array $data
     *
     * @return Response\Response
     */
    public function initCredit(array $data)
    {
        $buildData = $this->buildData(new InitCreditDataBuilder($data));

        return $this->requestExecutor->executeRequest('init_credit', $buildData);
    }

    /**
     * @docReference 2.1.7 CREDIT TRANSACTIONS
     *
     * @param array $data
     *
     * @return Response\Response
     */
    public function doCredit(array $data)
    {
        $buildData = $this->buildData(new DoCreditDataBuilder($data));

        return $this->requestExecutor->executeRequest('do_credit', $buildData);
    }

    /**
     * @docReference 6.3 SUBSEQUENT RECURRENT TRANSACTIONS
     *
     * @param array $data
     *
     * @return Response\Response
     */
    public function initRecurrent(array $data)
    {
        $buildData = $this->buildData(new InitRecurrentDataBuilder($data));

        return $this->requestExecutor->executeRequest('init_recurrent', $buildData);
    }

    /**
     * @docReference 6.3 SUBSEQUENT RECURRENT TRANSACTIONS
     *
     * @param array $data
     *
     * @return Response\Response
     */
    public function chargeRecurrent(array $data)
    {
        $buildData = $this->buildData(new ChargeRecurrentDataBuilder($data));

        return $this->requestExecutor->executeRequest('charge_recurrent', $buildData);
    }

    /**
     * @docReference 6.3 SUBSEQUENT RECURRENT TRANSACTIONS
     *
     * @param array $data
     *
     * @return Response\Response
     */
    public function initRecurrentCredit(array $data)
    {
        $buildData = $this->buildData(new InitRecurrentCreditDataBuilder($data));

        return $this->requestExecutor->executeRequest('init_recurrent_credit', $buildData);
    }

    /**
     * @docReference 6.3 SUBSEQUENT RECURRENT TRANSACTIONS
     *
     * @param array $data
     *
     * @return Response\Response
     */
    public function doRecurrentCredit(array $data)
    {
        $buildData = $this->buildData(new DoRecurrentCreditDataBuilder($data));

        return $this->requestExecutor->executeRequest('do_recurrent_credit', $buildData);
    }

    /**
     * @docReference 6.3 SUBSEQUENT RECURRENT TRANSACTIONS
     *
     * @param array $data
     *
     * @return Response\Response
     */
    public function initRecurrentP2P(array $data)
    {
        $buildData = $this->buildData(new InitRecurrentP2PDataBuilder($data));

        return $this->requestExecutor->executeRequest('init_recurrent_p2p', $buildData);
    }

    /**
     * @docReference 6.3 SUBSEQUENT RECURRENT TRANSACTIONS
     *
     * @param array $data
     *
     * @return Response\Response
     */
    public function doRecurrentP2P(array $data)
    {
        $buildData = $this->buildData(new DoRecurrentP2PDataBuilder($data));

        return $this->requestExecutor->executeRequest('do_recurrent_p2p', $buildData);
    }

    /**
     * @docReference 6.3 SUBSEQUENT RECURRENT TRANSACTIONS
     *
     * @param array $data
     *
     * @return Response\Response
     */
    public function initStoreCardSms(array $data)
    {
        $buildData = $this->buildData(new InitDataBuilder($data));
        $response  = $this->requestExecutor->executeRequest('init_store_card_sms', $buildData);

        return $response;
    }

    /**
     * @docReference 6.3 SUBSEQUENT RECURRENT TRANSACTIONS
     *
     * @param array $data
     *
     * @return Response\Response
     */
    public function initStoreCardCredit(array $data)
    {
        $buildData = $this->buildData(new InitCreditDataBuilder($data));
        $response  = $this->requestExecutor->executeRequest('init_store_card_credit', $buildData);

        return $response;
    }

    /**
     * @docReference 6.3 SUBSEQUENT RECURRENT TRANSACTIONS
     *
     * @param array $data
     *
     * @return Response\Response
     */
    public function initStoreCardP2P(array $data)
    {
        $buildData = $this->buildData(new InitP2PDataBuilder($data));
        $response  = $this->requestExecutor->executeRequest('init_store_card_p2p', $buildData);

        return $response;
    }

    /**
     * @docReference 6.3 SUBSEQUENT RECURRENT TRANSACTIONS
     *
     * @param array $data
     *
     * @return Response\Response
     */
    public function storeCard(array $data)
    {
        $buildData = $this->buildData(new ChargeDataBuilder($data));
        $response  = $this->requestExecutor->executeRequest('store_card', $buildData);

        return $response;
    }

    /**
     * Build base data for requests
     *
     * @param Builder $builder
     *
     * @return array
     */
    private function buildData(Builder $builder)
    {
        $buildData = $builder->build();

        $buildData['guid'] = $this->accessData['guid'];
        $buildData['account_guid'] = $this->accessData['guid'];
        $buildData['pwd'] = $this->accessData['pwd'];

        return $buildData;
    }
}
