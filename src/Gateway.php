<?php

namespace Omnipay\Coinpayments;

use Omnipay\Common\AbstractGateway;
use Omnipay\Coinpayments\Message\TransactionRequest;
use Omnipay\Coinpayments\Message\TransactionInfo;
use Omnipay\Coinpayments\Message\PayByNameRequest;
use Omnipay\Coinpayments\Message\TransferRequest;
use Omnipay\Coinpayments\Message\WithdrawalRequest;
use Omnipay\Coinpayments\Message\WithdrawalInfo;

class Gateway extends AbstractGateway
{

    public function getName()
    {
        return 'Coinpayments';
    }

    public function getDefaultParameters()
    {
        return array(
            'privateKey' => '',
            'publicKey' => ''
        );
    }

    public function getPrivateKey()
    {
        return $this->getParameter('privateKey');
    }

    public function setPrivateKey($value)
    {
        return $this->setParameter('privateKey', $value);
    }

    public function getPublicKey()
    {
        return $this->getParameter('publicKey');
    }

    public function setPublicKey($value)
    {
        return $this->setParameter('publicKey', $value);
    }

    /**
     * @return TransactionRequest
     */
    public function transaction(array $parameters = array())
    {
        return $this->createRequest(TransactionRequest::class, $parameters);
    }

    public function transactionInfo(array $parameters = array()){
        return $this->createRequest(TransactionInfo::class, $parameters);
    }
    /**
     * @return PayByNameRequest
     */
    public function PayByName(array $parameters = array())
    {
        return $this->createRequest(PayByNameRequest::class, $parameters);
    }

    /**
     * @return TransferRequest
     */
    public function transfer(array $parameters = array())
    {
        return $this->createRequest(TransferRequest::class, $parameters);
    }

    /**
     * @return WithdrawalRequest
     */
    public function withdrawal(array $parameters = array())
    {
        return $this->createRequest(WithdrawalRequest::class, $parameters);
    }

    public function withdrawalInfo(array $parameters = array())
    {
        return $this->createRequest(WithdrawalInfo::class, $parameters);
    }

}
