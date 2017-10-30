<?php
/**
 * Created by PhpStorm.
 * User: nattaponrakthong
 * Date: 10/30/2017 AD
 * Time: 11:18 PM
 */

namespace EPaymentGateway\services;


use EPaymentGateway\abstractService;

class Paypal extends abstractService
{

    /** @return array */
    protected function authenticationType()
    {

    }


    public function charge($name, $cardNumber, $expirationMonth, $expirationYear, $securityCode)
    {

    }

    public function authentication()
    {
        // TODO: Implement authentication() method.
    }

    public function getBalance()
    {
        // TODO: Implement getBalance() method.
    }
}