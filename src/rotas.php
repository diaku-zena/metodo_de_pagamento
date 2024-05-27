<?php


$rotas = [
    "paycourse" => "PaymentController@handleCoursePayment",
    "payexam" => "ExamPaymentController@handleExamPayment", // Exemplo adicional para pagamento de exame
];

// Obter a ação da URL amigável ou da query string
$acao = "paycourse"; // Rota inicial por padrão

if (isset($_GET['a'])) {
    $acao = $_GET['a'];
} else {
    $uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    $basePath = 'metodo_de_pagamento/public';
    if (strpos($uri, $basePath) === 0) {
        $uri = substr($uri, strlen($basePath) + 1);
    }
    $acao = $uri;
}


// Verificar se a ação está nas rotas configuradas
if (!array_key_exists($acao, $rotas)) {
    $acao = "paycourse";
}


// Redirecionamento das rotas
$partes = explode('@', $rotas[$acao]);
$controller = "src\\Controllers\\" . $partes[0];
$method = $partes[1];

// Verificar se a classe existe
if (class_exists($controller)) {

    // Carregar as configurações do Moodle e do gateway de pagamento
    $config = require '../config/config.php';
    
    $classInstance = new $controller($config); // Certifique-se de passar a configuração se necessário
    
    if (method_exists($classInstance, $method)) {
        $classInstance->$method();
    } else {
        echo "Método $method não encontrado na classe $controller.";
    }
} else {
    echo "Classe $controller não encontrada.";
}
