<?php
namespace src\Controllers;

use src\Services\MoodleAPI;
use src\Services\PaymentGateway;

class PaymentController {
    private $moodleAPI;
    private $paymentGateway;

    public function __construct($config) {
        $this->moodleAPI = new MoodleAPI($config);
        $this->paymentGateway = new PaymentGateway($config);
    }

    public function handleCoursePayment() {
        $courseId = 0;

        if (isset($_GET['courseid'])) {
            $courseId = $_GET['courseid'];
        }
        $courseInfo = $this->moodleAPI->getCourseInfo($courseId);
        echo "Funcionou wscc - ".$courseId;
        // Redirecione para a página de pagamento com as informações do curso
    }

    public function handleCallback() {
        $this->paymentGateway->handleCallback();
        // Após confirmação do pagamento, inscreva o usuário no curso e redirecione para a página do curso
    }
}
