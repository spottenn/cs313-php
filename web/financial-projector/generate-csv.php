<?php
session_start();


require_once 'connect-db.php';
require_once 'generate-projection.php';

$projection = generateProjection($db, $_SESSION['projectionId']);

$csvFile = fopen( $_SESSION['projectionId'] .'.csv', 'w');

$prettyNames = getPrettyNames($db);
$headerRow = array_keys($projection[0]);
unset ($headerRow['amount_cents']);
unset ($headerRow['total_cents']);
$headerRow[] = 'amount';
$headerRow[] = 'total';
fputcsv($csvFile, array_keys($projection[0]));

foreach ($projection as $row) {
    $row['date'] = date("m/d/Y", $row['date']);
    $row['amount_cents'] = centsToCurrencyString($row['amount_cents']);
    $row['total_cents'] = centsToCurrencyString($row['total_cents']);
    fputcsv($csvFile, $row);
}
fclose($csvFile);
unset($projection);

header("Content-type: text/csv");
header("Content-disposition: attachment; filename = " . $_SESSION['projectionName'] . ".csv");
readfile($_SESSION['projectionId'] .".csv");
?>