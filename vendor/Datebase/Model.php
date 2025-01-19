<?php

namespace vendor\Datebase;
use PDO;
abstract class Model
{
    protected string $table;
    protected ?Db $db = null;

    public function __construct()
    {
        $this->db = Db::getInstance();
        $this->table = $this->setTable();
    }

    /*
     * Устанавливаем имя таблы в нужных нам репозиториях
     *  Это обязательно, так все методы запросов будут работать с этой таблицей
     */
   abstract protected function setTable() : string;

    /**
     * Получить все записи из таблы
     */
    final public function all(): array
    {
        $sql = "SELECT * FROM {$this->table}";
        $stmt = $this->db->getPdo()->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Получаем все записи из таблы
     * @param mixed $value Значение для поиска
     * @param string $column Имя колонки
     * @return array
     */
    final public function getBy($value, string $column): array
    {
        $sql = "SELECT * FROM {$this->table} WHERE {$column} = :value";
        $stmt = $this->db->getPdo()->prepare($sql);
        $stmt->execute(['value' => $value]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}