<?php

namespace vendor\Datebase;

use PDOException;
use vendor\Interfaces\SingletonInterface;
use vendor\Traits\TSingleTone;
use PDO;

class Db implements SingletonInterface
{
    use TSingleTone;

    private \PDO $pdo;

    private function __construct()
    {
        try {
            $this->pdo = new \PDO('sqlite:file:database.sqlite');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Ошибка при подключении к бд: ' . $e->getMessage());
        }
    }

    public function query(string $sql, array $params = []): \PDOStatement
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }
}