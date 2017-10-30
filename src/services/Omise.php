<?php

namespace EPaymentGateway\services;

use EPaymentGateway\abstractService;
use OmiseAccount;
use OmiseBalance;
use OmiseBalanceTest;
use OmiseCharge;
use OmiseToken;

class Omise extends abstractService
{
    private $omise;
    private $publicKey;
    private $privateKey;

    public function __construct()
    {
        $this->publicKey = "pkey_test_58fx6mxffgdorir8t0f";
        $this->privateKey = "skey_test_58fx6mxg0i5f6iyww2a";

//        $account = OmiseAccount::retrieve();
//        $account->reload();
    }

    /** @return array */
    protected function authenticationType()
    {
        return "";
    }


    private function getToken($name, $cardNumber, $expirationMonth, $expirationYear, $securityCode, $city = null, $postalCode = null)
    {
        $result = OmiseToken::create(array(
            'card' => array(
                'name' => $name,
                'number' => $cardNumber,
                'expiration_month' => $expirationMonth,
                'expiration_year' => $expirationYear,
                'city' => 'Bangkok',
                'postal_code' => '10320',
                'security_code' => $securityCode,

            )
        ), $this->publicKey, $this->privateKey);

        $array = (array)$result;
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                return $value["card"]["id"];
            }
        }
        return false;
    }

    public function charge($name, $cardNumber, $expirationMonth, $expirationYear, $securityCode)
    {

        $token = $this->getToken($name, $cardNumber, $expirationMonth, $expirationYear, $securityCode);
        if (!empty($token)) {
            $charge = OmiseCharge::create(array(
                'amount' => 100000,
                'currency' => 'thb',
                'card' => $token
            ), $this->publicKey, $this->privateKey);

            return $charge;
        }

        return false;
    }

    public function getBalance()
    {
        $balance = OmiseBalance::retrieve($this->publicKey, $this->publicKey);
        return $balance;

    }

    public function authentication()
    {

    }
}