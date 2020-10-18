<?php
session_start();

require "connect-db.php";
require "db-helper.php";

function printNiceEntry($entry)
{
    echo "<tr class='entry, " . $entry['entry_type'] . "'>";

    echo "<td>" . $entry['start_date'] . "</td>";
    echo "<td>" . $entry['name'] . "</td>";
    echo "<td>" . $entry['entry_type'] . "</td>";

    echo "<td>";
    if ($entry['entry_type'] == "income") {
        echo "+";
    } else {
        echo "-";
    }
    echo "$" . $entry['amount_cents'] / 100 . "</td>";

    echo "</tr>";
}

function printNiceEntries($entries, $bankAccounts)
{
    echo "<div id='entries'><table><tr>";
    echo "<td>Date</td>";
    echo "<td>Name</td>";
    echo "<td>Type</td>";
    echo "<td>Amount</td>";
    echo "</tr>";
    foreach ($bankAccounts as $bankAccount) {
        echo "<tr>";
        echo "<td></td>";
        echo "<td>" . $bankAccount['name'] . "</td>";
        echo "<td>" . $bankAccount['type'] . " account</td>";
        echo "<td>+$" . $bankAccount['amount_cents'] / 100 . "</td>";
        echo "<tr>";
    }
    foreach ($entries as $entry) {
        printNiceEntry($entry);
    }
    echo "</table></div>";
}

$projection = htmlspecialchars($_GET['projection-name']);
$username = htmlspecialchars($_GET['username']);
$projectionId = getProjectionId($db, $username, $projection);
//echo "projection id: " . $projectionId;


$entries = getEntriesForOne($db, $projectionId);
//printSqlResults($entries);
//print_r($entries);
//
//
//echo "<br/>";
$bankAccounts = getBankAccountsForOne($db, $projectionId);
//printSqlResults($bankAccounts);
//print_r($bankAccounts);
//
//
//echo "<br/>";
//$projectionList = getProjectionList($db);
//printSqlResults($projectionList);
//

//print_r($entries);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Financial Projector</title>
    <link rel="stylesheet" type="text/css" href="../03-prove/assign04.css">
    <link rel="stylesheet" type="text/css" href="../03-prove/assign08.css">
    <link rel="stylesheet" type="text/css" href="../assign07.css">
    <link rel="stylesheet" type="text/css" href="financial-projector.css">
</head>
<body>
<div id="primary-div">
    <h1>Financial Projector</h1>
    <h2>Edit Projection:<?php echo $projection; ?></h2>
    <br/><br/>
    <p>Functionality to add entries will be added here.</p>
<!--    <form action="edit-projection.php">-->
<!--        Name<br>-->
<!--        <input id="apr" class="input-field" type="text" name="apr" oninput="validateApr()">-->
<!--        <p id="apr-feedback" class="feedback"></p><br>-->
<!--        <p></p>-->
<!--        Type<br>-->
<!--        <select><option>income</option><option>expense</option><option>bank account</option></select>-->
<!--        Type<br>-->
<!--        <select><option>income</option><option>expense</option><option>bank account</option></select>-->
<!--        Type<br>-->
<!--        <input id="term" class="input-field" type="text" name="term" oninput="validateTerm()">-->
<!--        <p id="term-feedback" class="feedback"></p><br>-->
<!--        <p></p>-->
<!--        Loan Amount ($):<br>-->
<!--        <input id="amount" class="input-field" type="text" name="amount" oninput="validateAmount()">-->
<!--        <p id="amount-feedback" class="feedback"></p><br>-->
<!--        <input id="calculate" type="button" value="Calculate">-->
<!--        <input id="clear" type="reset"><br>-->
<!--        <p id="payment-title">Monthly Payment:</p>-->
<!--        <output id="payment"> $0.00</output>-->
<!--    </form>-->
    <p><a class='button' href='generate-projection.php'>Generate Projection</a></p>
</div>
<div>
    <h2>Entries</h2>
    <?php printNiceEntries($entries, $bankAccounts); ?>
</div>
</body>
