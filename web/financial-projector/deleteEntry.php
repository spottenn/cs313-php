<?php
require_once 'connect-db.php';
require_once 'db-helper.php';
$entryType = htmlspecialchars($_POST['entryType']);
$parameters = array(':id' => htmlspecialchars($_POST['entryId']));
if ($entryType == 'bank') {
    $sql = 'DELETE FROM bank_accounts WHERE id = :id';
    insertSqlStatement($db, $sql, $parameters);
} elseif ($entryType = 'entry') {
    $sql = 'DELETE FROM proj_entries WHERE id = :id';
    insertSqlStatement($db, $sql, $parameters);
}