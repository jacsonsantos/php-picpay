<?php
namespace PhpPicPay\Suport\Config;

final class Credential
{
    /**
     * @var string
     */
    private $token;
    /**
     * @var string
     */
    private $seller;

    public function __construct(string $token, string $seller)
    {

        $this->token = $token;
        $this->seller = $seller;
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @param string $token
     */
    public function setToken(string $token)
    {
        $this->token = $token;
    }

    /**
     * @return string
     */
    public function getSeller(): string
    {
        return $this->seller;
    }

    /**
     * @param string $seller
     */
    public function setSeller(string $seller)
    {
        $this->seller = $seller;
    }
}