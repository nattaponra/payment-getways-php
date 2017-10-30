<?php

namespace EPaymentGateway;

class EPaymentGateway
{
    public $service;
    public function __construct(abstractService $service)
    {
        $this->service = $service;
    }


}