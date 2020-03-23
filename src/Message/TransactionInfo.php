<?php 
namespace Omnipay\Coinpayments\Message;

use GuzzleHttp\Exception\BadResponseException;

class TransactionInfo extends AbstractRequest{

    public function getData()
    {
        
        return [
            'cmd' => 'get_tx_info',
            'txid' => $this->getTxid(),
        ];
    }
    protected function getHeaders($hmac)
    {
        return [
            'HMAC' => $hmac,
            'Content-Type' => 'application/x-www-form-urlencoded'
        ];
    }

    public function sendData($data)
    {
        $hmac = $this->getSig($data, 'get_tx_info');

        $data['version'] = 1;
        $data['cmd'] = 'get_tx_info';
        $data['key'] = $this->getPublicKey();
        $data['format'] = 'json';

        try {
            $response = $this->httpClient->request('POST', $this->getEndpoint(), $this->getHeaders($hmac), http_build_query($data));
        } catch (BadResponseException $e) {
            $response = $e->getResponse();
        }

        $result = json_decode($response->getBody()->getContents(), true);
        return new TransactionResponse($this, $result);
    }

}



