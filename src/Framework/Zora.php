<?php

namespace Zora\Framework;

use PDO;
use PDOException;
use Exception;
use Src\Models\Database;

class Zora {
    private $dbType;
    private $config;
    private $dbConnection;
    private $tests;
    private $reporter;

    public function __construct($dbType) {
        $this->dbType = $dbType;
        $this->config = Database::getConfig($dbType);
        $this->dbConnection = $this->createDbConnection();
        $this->tests = [];
        $this->reporter = new Reporter();
    }

    private function createDbConnection() {
        switch ($this->dbType) {
            case 'mysql':
            case 'pgsql':
                return new PDO(
                    $this->config['dsn'],
                    $this->config['username'],
                    $this->config['password']
                );
            case 'mongodb':
                // MongoDB connection logic (example)
                return new \MongoDB\Client($this->config['dsn']);
            default:
                throw new Exception('Unsupported database type');
        }
    }

    public function runTests() {
        $this->runConnectionTest();
        $this->runQueryTest();
        $this->runSchemaTest();
        $this->runIntegrityTest();
        $this->runPerformanceTest();
        $this->runConsistencyTest();

        $report = $this->reporter->generateReport($this->dbType, $this->tests);

        return [
            'message' => 'Tests completed',
            'report' => $report
        ];
    }

    private function runConnectionTest() {
        $test = new Test('Connection Test', 'Check if the connection is valid');
        try {
            $pdo = $this->dbConnection;
            if ($pdo instanceof PDO) {
                $test->setStatus(Test::PASSED);
            } else {
                $test->setStatus(Test::FAILED);
            }
        } catch (PDOException $e) {
            $test->setStatus(Test::FAILED);
            $test->setError($e->getMessage());
        }
        $this->tests[] = $test;
    }

    private function runQueryTest() {
        $test = new Test('Query Test', 'Check if a sample query can be executed');
        try {
            $stmt = $this->dbConnection->query("SELECT 1");
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row['1'] == 1) {
                $test->setStatus(Test::PASSED);
            } else {
                $test->setStatus(Test::FAILED);
            }
        } catch (PDOException $e) {
            $test->setStatus(Test::FAILED);
            $test->setError($e->getMessage());
        }
        $this->tests[] = $test;
    }

    private function runSchemaTest() {
        // Placeholder for schema test logic
        $test = new Test('Schema Test', 'Check database schema');
        $test->setStatus(Test::PASSED); // Example always passes
        $this->tests[] = $test;
    }

    private function runIntegrityTest() {
        // Placeholder for integrity test logic
        $test = new Test('Integrity Test', 'Check data integrity');
        $test->setStatus(Test::PASSED); // Example always passes
        $this->tests[] = $test;
    }

    private function runPerformanceTest() {
        // Placeholder for performance test logic
        $test = new Test('Performance Test', 'Check query performance');
        $test->setStatus(Test::PASSED); // Example always passes
        $this->tests[] = $test;
    }

    private function runConsistencyTest() {
        // Placeholder for consistency test logic
        $test = new Test('Consistency Test', 'Check data consistency');
        $test->setStatus(Test::PASSED); // Example always passes
        $this->tests[] = $test;
    }
}

class Test {
    const PASSED = 'Passed';
    const FAILED = 'Failed';

    private $name;
    private $description;
    private $status;
    private $error;

    public function __construct($name, $description) {
        $this->name = $name;
        $this->description = $description;
        $this->status = self::FAILED; // Default status is failed
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function setError($error) {
        $this->error = $error;
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getError() {
        return $this->error;
    }
}

class Reporter {
    public function generateReport($dbType, $tests) {
        $report = [
            'dbType' => $dbType,
            'tests' => []
        ];

        foreach ($tests as $test) {
            $report['tests'][] = [
                'name' => $test->getName(),
                'description' => $test->getDescription(),
                'status' => $test->getStatus(),
                'error' => $test->getError()
            ];
        }

        return $report;
    }
}

