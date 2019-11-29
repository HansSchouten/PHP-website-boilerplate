<?php

function e($value, $doubleEncode = true)
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8', $doubleEncode);
}

function dd($var)
{
    print_r($var);
    exit();
}

function allFromTable($table)
{
    global $db;

    $stmt = $db->prepare("SELECT * FROM {$table}");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetchAll();
}

function query($query, array $parameters = [])
{
    global $db;

    $stmt = $db->prepare($query);
    $stmt->execute($parameters);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetchAll();
}

function select($query, $parameters)
{
    global $db;

    $stmt = $db->prepare($query);
    $stmt->execute($parameters);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetchAll();
}

function replace($table, $data)
{
    global $db;

    query("TRUNCATE {$table}");

    foreach ($data as $record) {
        $columns = implode(', ', array_keys($record));
        $questionMarks = implode(', ', array_fill(0, sizeof($record), '?'));
        query(
            "INSERT INTO {$table} ({$columns}) VALUES ({$questionMarks})",
            array_values($record)
        );
    }
}
