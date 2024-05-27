<?php
namespace src\Services;

class PaymentGateway {
    private $apiKey;
    private $callbackUrl;

    public function __construct($config) {
        $this->apiKey = $config['payment_gateway']['api_key'];
        $this->callbackUrl = $config['payment_gateway']['callback_url'];
    }

    public function initiatePayment($amount, $description) {
        // Implemente a chamada à API do gateway de pagamento para iniciar o pagamento
    }

    public function handleCallback() {
        // Implemente a lógica para lidar com o callback do pagamento
    }
}
