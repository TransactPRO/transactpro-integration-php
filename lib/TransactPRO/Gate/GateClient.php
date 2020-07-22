<?php

namespace TransactPRO\Gate;

use TransactPRO\Gate\Builders\Builder;
use TransactPRO\Gate\Builders\CancelDmsDataBuilder;
use TransactPRO\Gate\Builders\CancelRequestDataBuilder;
use TransactPRO\Gate\Builders\ChargeDataBuilder;
use TransactPRO\Gate\Builders\ChargeHoldDataBuilder;
use TransactPRO\Gate\Builders\ChargeRecurrentDataBuilder;
use TransactPRO\Gate\Builders\DoRecurrentCreditDataBuilder;
use TransactPRO\Gate\Builders\DoRecurrentP2PDataBuilder;
use TransactPRO\Gate\Builders\DoRecurrentB2PDataBuilder;
use TransactPRO\Gate\Builders\DoRecurrentA2ADataBuilder;
use TransactPRO\Gate\Builders\InitDataBuilder;
use TransactPRO\Gate\Builders\InitDmsDataBuilder;
use TransactPRO\Gate\Builders\InitCreditDataBuilder;
use TransactPRO\Gate\Builders\InitP2PDataBuilder;
use TransactPRO\Gate\Builders\InitB2PDataBuilder;
use TransactPRO\Gate\Builders\InitA2ADataBuilder;
use TransactPRO\Gate\Builders\DoCreditDataBuilder;
use TransactPRO\Gate\Builders\DoP2PDataBuilder;
use TransactPRO\Gate\Builders\ChargeB2PDataBuilder;
use TransactPRO\Gate\Builders\DoA2ADataBuilder;
use TransactPRO\Gate\Builders\InitRecurrentDataBuilder;
use TransactPRO\Gate\Builders\InitRecurrentCreditDataBuilder;
use TransactPRO\Gate\Builders\InitRecurrentP2PDataBuilder;
use TransactPRO\Gate\Builders\InitRecurrentB2PDataBuilder;
use TransactPRO\Gate\Builders\InitRecurrentA2ADataBuilder;

use TransactPRO\Gate\Builders\MakeHoldDataBuilder;
use TransactPRO\Gate\Builders\RefundDataBuilder;
use TransactPRO\Gate\Builders\StatusRequestDataBuilder;
use TransactPRO\Gate\Builders\AccessDataBuilder;
use TransactPRO\Gate\Builders\StatusRequestDataBuilderMerchantID;
use TransactPRO\Gate\Builders\GetTerminalLimitsBuilder;
use TransactPRO\Gate\Builders\GetPaymentDataBuilder;
use TransactPRO\Gate\Builders\VerifyEnrollmentDataBuilder;
use TransactPRO\Gate\Builders\VerifyCardDataBuilder;
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
     * @docReference 2.1.3 SMS (Single Message) transaction, card details entered at gateway side
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
     * @docReference 3.2.1 HOW TO CANCEL DMS HOLD WITHOUT REFUNDS
     *
     * @param array $data
     *
     * @return Response\Response
     */
    public function cancelRequest(array $data)
    {
        $buildData = $this->buildData(new CancelRequestDataBuilder($data));

        return $this->requestExecutor->executeRequest('cancel_request', $buildData);
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
     * @docReference 2.5.1 TRANSACTION STATUS REQUEST
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
     * @docReference 2.5.1 TRANSACTION STATUS REQUEST
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
     * @docReference 2.1.15 P2P TRANSACTIONS REQUIREMENTS ON INITIALIZATION REQUEST URL
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
     * @docReference 2.1.16 P2P TRANSACTIONS REQUIREMENTS ON FINAL REQUEST URL
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
     * @docReference 2.1.19 A2A TRANSACTIONS REQUIREMENTS ON INITIALIZATION REQUEST URL
     *
     * @param array $data
     *
     * @return Response\Response
     */
    public function initA2A(array $data)
    {
        $buildData = $this->buildData(new InitA2ADataBuilder($data));

        return $this->requestExecutor->executeRequest('init_a2a', $buildData);
    }

    /**
     * @docReference 2.1.20 A2A TRANSACTIONS REQUIREMENTS ON FINAL REQUEST URL
     *
     * @param array $data
     *
     * @return Response\Response
     */
    public function doA2A(array $data)
    {
        $buildData = $this->buildData(new DoA2ADataBuilder($data));

        return $this->requestExecutor->executeRequest('do_a2a', $buildData);
    }

    /**
     * 2.1.17 B2P TRANSACTIONS REQUIREMENTS ON INITIALIZATION REQUEST URL
     * @param array $data
     * @return Response\Response
     */
    public function initB2P(array $data)
    {
        $buildData = $this->buildData(new InitB2PDataBuilder($data));
        $response  = $this->requestExecutor->executeRequest('init_b2p', $buildData);

        return $response;
    }

    /**
     * 2.1.18 B2P TRANSACTIONS REQUIREMENTS ON FINAL REQUEST URL
     * @param array $data
     * @return Response\Response
     */
    public function chargeB2P(array $data)
    {
        $buildData = $this->buildData(new ChargeB2PDataBuilder($data));
        $response  = $this->requestExecutor->executeRequest('charge_b2p', $buildData);

        return $response;
    }

    /**
     * @docReference 2.1.13 CRD TRANSACTIONS REQUIREMENTS ON INITIALIZATION REQUEST URL
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
     * @docReference 2.1.14 CRD TRANSACTIONS REQUIREMENTS ON FINAL REQUEST URL
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
    public function initRecurrentA2A(array $data)
    {
        $buildData = $this->buildData(new InitRecurrentA2ADataBuilder($data));

        return $this->requestExecutor->executeRequest('init_recurrent_a2a', $buildData);
    }

    /**
     * @docReference 6.3 SUBSEQUENT RECURRENT TRANSACTIONS
     *
     * @param array $data
     *
     * @return Response\Response
     */
    public function doRecurrentA2A(array $data)
    {
        $buildData = $this->buildData(new DoRecurrentA2ADataBuilder($data));

        return $this->requestExecutor->executeRequest('do_recurrent_a2a', $buildData);
    }

    /**
     * @docReference 6.3 SUBSEQUENT RECURRENT TRANSACTIONS
     *
     * @param array $data
     *
     * @return Response\Response
     */
    public function initRecurrentB2P(array $data)
    {
        $buildData = $this->buildData(new InitRecurrentB2PDataBuilder($data));
        $response  = $this->requestExecutor->executeRequest('init_recurrent_b2p', $buildData);
        return $response;
    }

    /**
     * @docReference 6.3 SUBSEQUENT RECURRENT TRANSACTIONS
     *
     * @param array $data
     *
     * @return Response\Response
     */
    public function doRecurrentB2P(array $data)
    {
        $buildData = $this->buildData(new DoRecurrentB2PDataBuilder($data));
        $response  = $this->requestExecutor->executeRequest('do_recurrent_b2p', $buildData);

        return $response;
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
     * @docReference 6.2 USING NOT VERIFIED ON BANK'S SIDE CARD DATA FOR RECURRENT TRANSACTIONS
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
     * @docReference 6.2 USING NOT VERIFIED ON BANK'S SIDE CARD DATA FOR RECURRENT TRANSACTIONS
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
     * @docReference 6.2 USING NOT VERIFIED ON BANK'S SIDE CARD DATA FOR RECURRENT TRANSACTIONS
     *
     * @param array $data
     *
     * @return Response\Response
     */
    public function initStoreCardB2P(array $data)
    {
        $buildData = $this->buildData(new InitB2PDataBuilder($data));
        $response  = $this->requestExecutor->executeRequest('init_store_card_b2p', $buildData);

        return $response;
    }

    /**
     * @docReference 6.2 USING NOT VERIFIED ON BANK'S SIDE CARD DATA FOR RECURRENT TRANSACTIONS
     *
     * @param array $data
     *
     * @return Response\Response
     */
    public function initStoreCardA2A(array $data)
    {
        $buildData = $this->buildData(new InitA2ADataBuilder($data));
        $response  = $this->requestExecutor->executeRequest('init_store_card_a2a', $buildData);

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

    /**
     * @docReference 4.1 TERMINAL LIMITS
     * @param array $data
     * @return Response\Response
     */
    public function verifyEnrollment(array $data)
    {
        $buildData = $this->buildData(new VerifyEnrollmentDataBuilder($data));
        $response  = $this->requestExecutor->executeRequest('verify_enrollment', $buildData);

        return $response;
    }

    /**
     * @docReference 4.1 TERMINAL LIMITS
     * @param array $data
     * @return Response\Response
     */

    public function getTerminalLimits(array $data)
    {
        $buildData = $this->buildData(new GetTerminalLimitsBuilder($data));
        $response  = $this->requestExecutor->executeRequest('get_terminal_limits', $buildData);

        return $response;
    }


    public function getPaymentStatus(array $data)
    {
        $buildData = $this->buildData(new GetPaymentDataBuilder($data));
        $response  = $this->requestExecutor->executeRequest('transaction_get_payment_status', $buildData);

        return $response;
    }


    /**
     * @docReference 3.4 CARD VERIFICATION
     * @param array $data
     * @return Response\Response
     */
    public function verifyCard(array $data)
    {
        $buildData = $this->buildData(new VerifyCardDataBuilder($data));
        $response  = $this->requestExecutor->executeRequest('verify_card', $buildData);

        return $response;
    }
}
