<?php 
namespace Omnipay\Coinpayments\Message;

use GuzzleHttp\Exception\BadResponseException;

class WithdrawalInfo extends AbstractRequest{

    public function getData()
    {
        
        return [
            'cmd' => 'get_withdrawal_info',
            'id' => $this->getID(),
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
        $hmac = $this->getSig($data, 'get_withdrawal_info');

        $data['version'] = 1;
        $data['cmd'] = 'get_withdrawal_info';
        $data['key'] = $this->getPublicKey();
        $data['format'] = 'json';

        try {
            $response = $this->httpClient->request('POST', $this->getEndpoint(), $this->getHeaders($hmac), http_build_query($data));
        } catch (BadResponseException $e) {
            $response = $e->getResponse();
        }

        $result = json_decode($response->getBody()->getContents(), true);
        return new PayByNameResponse($this, $result);
    }

}



