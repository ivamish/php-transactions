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
        try {
            $sql = "SELECT {$this->table}.* FROM {$this->table}";

            foreach ($this->relations() as $relation) {
                $type = $relation['type'] ?? 'INNER';
                $table = $relation['table'];
                $foreignKey = $relation['foreignKey'];
                $localKey = $relation['localKey'] ?? 'id';
                $sql .= " {$type} JOIN {$table} ON {$this->table}.{$localKey} = {$table}.{$foreignKey}";
            }

            $stmt = $this->db->getPdo()->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new \RuntimeException("Ошибка при выполнении запроса: " . $e->getMessage());
        }
    }

    /**
     * Получаем все записи из таблы
     * @param mixed $value Значение для поиска
     * @param string $column Имя колонки
     * @return array
     */
    final public function getBy($value, string $column): array
    {
        try {
            $sql = "SELECT {$this->table}.* FROM {$this->table}";


            foreach ($this->relations() as $relation) {
                $type = $relation['type'] ?? 'INNER';
                $table = $relation['table'];
                $foreignKey = $relation['foreignKey'];
                $localKey = $relation['localKey'] ?? 'id';
                $sql .= " {$type} JOIN {$table} ON {$this->table}.{$localKey} = {$table}.{$foreignKey}";
            }


            $sql .= " WHERE {$this->table}.{$column} = :value";

            $stmt = $this->db->getPdo()->prepare($sql);
            $stmt->execute(['value' => $value]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new \RuntimeException("Ошибка при выполнении запроса: " . $e->getMessage());
        }
    }

    /**
     * Возвращает описание связей модели,
     * необходимо переопределить в дочерних классах, если надо
     *
     * [
     *      'table' => 'posts', // Имя связанной таблицы
     *      'foreignKey' => 'user_id', // Ключ в связанной таблице
     *      'localKey' => 'id', // Ключ в текущей таблице (опционально)
     *      'type' => 'INNER', // Тип JOIN (опционально)
     * ]
     *
     * @return array
     */
    protected function relations(): array
    {
        return [];
    }
}