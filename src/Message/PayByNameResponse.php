<?php

namespace Omnipay\Coinpayments\Message;

use Omnipay\Common\Message\AbstractResponse;

/**
 * Response
 */
class PayByNameResponse extends AbstractResponse
{

    public function isSuccessful()
    {
        return isset($this->data['error']) && $this->data['error'] == 'ok';
    }

    public function getID()
    {
        if (isset($this->data['result'])) {
            return $this->data['result']['id'];
        }
    }

    public function getStatus()
    {
        if (isset($this->data['result'])) {
            return $this->data['result']['status'];
        }
    }
	
	public function getAmount()
    {
        if (isset($this->data['result'])) {
            return $this->data['result']['amount'];
        }
    }

    public function getAmountFloat()
    {
        if (isset($this->data['result'])) {
            return $this->data['result']['amountf'];
        }
    }

    public function getTime()
    {
        if (isset($this->data['result'])) {
            return $this->data['result']['time_created'];
        }
    }

    public function getCoin()
    {
        if (isset($this->data['result'])) {
            return $this->data['result']['coin'];
        }
    }

    public function getSendAddress()
    {
        if (isset($this->data['result'])) {
            return $this->data['result']['send_address'];
        }
    }


    public function getHash()
    {
        if (isset($this->data['result'])) {
            return $this->data['result']['send_txid'];
        }
    }

    public function getSatatusText()
    {
        if (isset($this->data['result'])) {
            return $this->data['result']['status_text'];
        }
    }

    /**
     * Does the response require a redirect?
     *
     * @return boolean
     */
    public function isRedirect()
    {
        return false;
    }

    /**
     * Get the response data.
     *
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }
}