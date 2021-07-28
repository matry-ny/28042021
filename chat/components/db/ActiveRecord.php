<?php

namespace components\db;

use App;
use PDO;
use RuntimeException;

abstract class ActiveRecord
{
    protected array $securedFields = [
        'created_at',
        'updated_at',
    ];

    private PDO $db;

    protected string $primaryKey;

    protected array $attributes;

    protected bool $isNewRecord = true;

    public function __construct()
    {
        $this->db = App::get()->db()->getConnection();

        $this->initAttributes();
        $this->initPrimaryKey();
    }

    abstract protected function tableName(): string;

    public static function findOne(int|string $id, ?string $column = null): static
    {
        $entity = new static();

        $column = $column ?: $entity->primaryKey;
        $sql = "SELECT * FROM `{$entity->tableName()}` WHERE `{$column}` = :id LIMIT 1";
        $stmt = App::get()->db()->getConnection()->prepare($sql);
        $stmt->execute([':id' => $id]);

        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        $entity->setAttributes($data);

        return $entity;
    }

    /**
     * @return static[]
     */
    public static function findAll(): array
    {
        $entity = new static();

        $sql = "SELECT * FROM `{$entity->tableName()}`";
        $stmt = App::get()->db()->getConnection()->query($sql);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $result = [];
        foreach ($data as $row) {
            $entity->setAttributes($row);
            $result[] = clone $entity;
        }

        return $result;
    }

    public function save(): bool
    {
        return $this->isNewRecord ? $this->insert() : $this->update();
    }

    public function delete()
    {
        $sql = "DELETE FROM `{$this->tableName()}` WHERE `{$this->primaryKey}` = :id LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $isOk = $stmt->execute(['id' => $this->attributes[$this->primaryKey]]);
        if ($isOk) {
            $this->initAttributes();
        }

        return $isOk;
    }

    private function insert(): bool
    {
        $attributes = $this->attributes;
        unset($attributes[$this->primaryKey]);

        $keys = array_keys($attributes);
        $fields = implode('`, `', $keys);
        $aliases = implode(', :', $keys);

        $sql = "INSERT INTO `{$this->tableName()}` (`{$fields}`) VALUES (:{$aliases})";
        $stmt = $this->db->prepare($sql);
        $isOk = $stmt->execute($attributes);
        if ($isOk) {
            $this->{$this->primaryKey} = $this->db->lastInsertId();
            $this->isNewRecord = false;
        }

        return $isOk;
    }

    private function update(): bool
    {
        $values = [];
        $params = [
            $this->primaryKey => $this->attributes[$this->primaryKey],
        ];
        foreach ($this->attributes as $attribute => $value) {
            if (in_array($attribute, $this->securedFields, true)) {
                continue;
            }

            $values[] = "`{$attribute}` = :{$attribute}";
            $params[$attribute] = $value;
        }
        $fields = implode(', ', $values);

        $sql = "UPDATE `{$this->tableName()}` SET {$fields} WHERE `{$this->primaryKey}` = :{$this->primaryKey} LIMIT 1";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($params);
    }

    public function __get(string $key): mixed
    {
        if (!isset($this->{$key})) {
            throw new RuntimeException("Property '{$key}' is not exists");
        }

        return $this->attributes[$key];
    }

    public function __set(string $key, mixed $value): void
    {
        if (!isset($this->{$key})) {
            throw new RuntimeException("Property '{$key}' is not exists");
        }

        $this->attributes[$key] = $value;
    }

    public function __isset(string $key): bool
    {
        return array_key_exists($key, $this->attributes);
    }

    private function setAttributes(array $data): void
    {
        $this->isNewRecord = false;
        foreach ($data as $key => $value) {
            $this->{$key} = $value;
        }
    }

    private function initAttributes(): void
    {
        $dbName = App::get()->db()->getDbName();
        $sql = <<<SQL
            SELECT `COLUMN_NAME` 
            FROM `INFORMATION_SCHEMA`.`COLUMNS` 
            WHERE `TABLE_SCHEMA` = '{$dbName}' AND `TABLE_NAME` = '{$this->tableName()}'
            ORDER BY `ORDINAL_POSITION`
        SQL;

        $stmt = $this->db->query($sql, PDO::FETCH_ASSOC);
        $data = $stmt->fetchAll();

        $keys = array_column($data, 'COLUMN_NAME');
        $values = array_fill(0, count($data), null);
        $this->attributes = array_combine($keys, $values);

        $this->isNewRecord = true;
    }

    private function initPrimaryKey(): void
    {
        $sql = "SHOW KEYS FROM `{$this->tableName()}` WHERE `Key_name` = 'PRIMARY'";
        $stmt = $this->db->query($sql, PDO::FETCH_ASSOC);
        $data = $stmt->fetch();

        if (!isset($data['Column_name'])) {
            throw new RuntimeException("Table '{$this->tableName()}' has no primary key");
        }

        $this->primaryKey = $data['Column_name'];
        $this->securedFields[] = $this->primaryKey;
    }

    public function __sleep(): array
    {
        return [
            'securedFields',
            'primaryKey',
            'attributes',
            'isNewRecord',
        ];
    }

    public function __wakeup(): void
    {
        $this->db = App::get()->db()->getConnection();
    }
}
