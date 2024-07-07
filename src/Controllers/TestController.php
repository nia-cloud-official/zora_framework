<?php

namespace Src\Controllers;

use Zora\Framework\Zora;

class TestController {
    public function handleRequest() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['db'])) {
            $dbType = $_GET['db'];
            $zora = new Zora($dbType);
            
            try {
                $result = $zora->runTests();
                echo json_encode([
                    'message' => $result['message'],
                    'report' => $result['report']
                ]);
            } catch (\Exception $e) {
                echo json_encode([
                    'error' => 'An error occurred: ' . $e->getMessage()
                ]);
            }
            
            return;
        }
        
        $this->showUI();
    }
    
    private function showUI() {
        require_once __DIR__ . '/../Views/index.php';
    }
}
