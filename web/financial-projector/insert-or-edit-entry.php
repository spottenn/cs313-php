<?php
session_start();

require_once 'connect-db.php';
require_once 'db-helper.php';
require_once 'helper-functions.php';

$type = htmlspecialchars($_POST['type']);

if ($type == 'checking' || $type == 'savings') {
    //insert bank account
    $parameters = array(
        ':projection_id' => $_SESSION['projectionId'],
        ':name' => htmlspecialchars($_POST['name']),
        ':type' => $type,
        ':amount_cents' => htmlspecialchars($_POST['amount']) * 100,
    );
    insertBankAccount($db, $parameters);
} else if ($type == 'income' || $type == 'expense') {
    if (isset($_POST['repeats-checkbox']) && $_POST['repeats-checkbox'] == 'does-repeat') {
        $repeatType = htmlspecialchars($_POST['repeat-interval']);
    } else {
        $repeatType = 'once';
    }
    if (isset($_POST['ends-checkbox']) && $_POST['ends-checkbox'] == 'does-repeat') {
        $endDate = strtotime(htmlspecialchars($_POST['end-date']));
    } else {
        $endDate = NULL;
    }
    $parameters = array(
        ':projection_id' => $_SESSION['projectionId'],
        ':type' => $type,
        ':name' => htmlspecialchars($_POST['name']),
        ':amount_cents' => htmlspecialchars($_POST['amount']) * 100,
        ':start_date' => htmlspecialchars($_POST['start-date']),
        ':end_date' => $endDate,
        ':repeats' => $repeatType,
        ':repeat_frequency' => htmlspecialchars($_POST['repeat_frequency'])
    );
    insertProjEntry($db, $parameters);
} else {
    die();
}

printNiceEntries(getEntriesForOne($db, $_SESSION['projectionId']), getBankAccountsForOne($db, $_SESSION['projectionId']));
