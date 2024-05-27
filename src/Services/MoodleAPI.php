<?php
namespace src\Services;

class MoodleAPI {
    private $apiUrl;
    private $token;

    public function __construct($config) {
        $this->apiUrl = $config['moodle']['api_url'];
        $this->token = $config['moodle']['token'];
    }

    public function getCourseInfo($courseId) {
        return 0;
        // Implemente a chamada à API do Moodle para obter informações do curso
    }

    public function enrollUser($userId, $courseId) {
        // Implemente a chamada à API do Moodle para inscrever o usuário no curso
    }
}
