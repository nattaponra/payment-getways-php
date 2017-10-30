<?php
require_once __DIR__ . '/../app/autoload.php';


use EPaymentGateway\EPaymentGateway;
use EPaymentGateway\services\Omise;
use PHPUnit\Framework\TestCase;


class authTest extends TestCase
{

    public function testCharge()
    {
        $name = "JOHN DOE";
        $cardNumber = "4242424242424242";
        $expirationMonth = 12;
        $expirationYear = 2020;
        $securityCode = 123;

        $e = new EPaymentGateway(new Omise());
        $result = $e->service->charge($name, $cardNumber, $expirationMonth, $expirationYear, $securityCode);
        print_r($result);

    }

}