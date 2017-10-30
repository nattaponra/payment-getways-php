<?php

namespace EPaymentGateway;


abstract class abstractService
{

    /** @return array */
    abstract protected function authenticationType();

    abstract public function authentication();


    abstract public function getBalance();


    abstract public function charge($name, $cardNumber, $expirationMonth, $expirationYear, $securityCode);

}