<?php

namespace components;

use PDO;

class DB
{
    private string $host;
    private string $login;
    private string $password;
    private string $db;

    private ?PDO $connection = null;

    public function __construct(string $host, string $login, string $password, string $db)
    {
        $this->host = $host;
        $this->login = $login;
        $this->password = $password;
        $this->db = $db;
    }

    public function getConnection(): PDO
    {
        if ($this->connection === null) {
            $this->connection = new PDO(
                "mysql:dbname={$this->db};host={$this->host};charset=UTF8",
                $this->login,
                $this->password
            );
        }

        return $this->connection;
    }

    public function getDbName(): string
    {
        return $this->db;
    }
}
