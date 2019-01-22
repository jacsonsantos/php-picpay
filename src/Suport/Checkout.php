<?php
namespace PhpPicPay\Suport;

use PhpPicPay\Suport\Request\HttpRequest;
use PhpPicPay\Suport\Request\RequestInterface;

class Checkout
{
    private $request;

    public function __construct(RequestInterface $request)
    {
        $this->request =new HttpRequest($request);
    }

    public function send()
    {
        return $this->request->dispatch();
    }
}