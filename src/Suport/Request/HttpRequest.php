<?php
namespace PhpPicPay\Suport\Request;

use PhpPicPay\Exception\DataValidationException;
use PhpPicPay\Exception\InternalErrorException;
use PhpPicPay\Exception\InvalidTokenException;

class HttpRequest
{
    /**
     * @var RequestInterface
     */
    private $request;

    public function __construct(RequestInterface $request)
    {
        $this->request = $request;
    }

    /**
     * @param RequestInterface $request
     * @return array
     */
    public function postRequest(RequestInterface $request) : array
    {
        $ch = curl_init($request->url());
        curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode($request->payload()));
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array_merge(['Content-Type:application/json'],$request->header()));
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        $result = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return [$httpcode,json_decode($result)];
    }

    /**
     * @param RequestInterface $request
     * @return array
     */
    public function getRequest(RequestInterface $request) : array
    {
        $ch = curl_init($request->url());
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array_merge(['Content-Type:application/json'],$request->header()));
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        $result = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        return [$httpcode,json_decode($result)];
    }

    /**
     * Dispatch Request
     */
    public function dispatch()
    {
        switch (strtoupper($this->request->method())) {
            case 'POST':
                $response = $this->catch($this->postRequest($this->request));
                break;
            case 'GET':
                $response = $this->catch($this->getRequest($this->request));
                break;
            default:
                $response = $this->catch($this->getRequest($this->request));
                break;
        }

        return $response;
    }

    private function catch($postRequest)
    {
        list($code, $result) = $postRequest;

        switch ($code) {
            case 200:
                return $result;
                break;
            case 401:
                throw new InvalidTokenException();
                break;
            case 422:
                throw new DataValidationException();
                break;
            case 500:
                throw new InternalErrorException();
                break;
            default:
                throw new \Exception('Error in Request');
                break;
        }

        return null;
    }
}