<?php

function getDbConnection(): mysqli
{
    static $mysqli;

    if (!$mysqli) {
        $config = config('db');
        $mysqli = @mysqli_connect(
            $config['host'],
            $config['user'],
            $config['password'],
            $config['db_name']
        );
    }

    if (!$mysqli) {
        exit('DB connection is broken');
    }

    return $mysqli;
}

function executeBatchInsertQuery(mysqli $connect, string $sql, array $batch): bool
{
    $sql .= implode(', ', $batch);
    return mysqli_query($connect, $sql);
}
