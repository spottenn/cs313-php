<?php
function getSignedDollarString($signedCents) {
    $string = "";
    if ($signedCents > 0 ) {
        $string .= "+";
    } else {
        $string .= "-";
    }
    $cents = abs($signedCents);
    $string .= "$" . $cents / 100;
    return $string;
}

function getEntrySignedCents($entry) {
    $cents = $entry['amount_cents'];
    if ($entry['entry_type'] == "expense") {
        $cents *= -1;
    }
    return $cents;
}
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
        echo "</tr>";
    }
    foreach ($entries as $entry) {
        printNiceEntry($entry);
    }
    echo "</table></div>";
}

function printNiceProjectionTable($projectionLines)
{
    echo "<div id='projection'><table><tr>";
    echo "<td>Date</td>";
    echo "<td>Name</td>";
    echo "<td>Amount</td>";
    echo "<td>Balance</td>";
    echo "</tr>";
    $numFmt = NumberFormatter("en_US", NumberFormatter::CURRENCY);
    foreach ($projectionLines as $line) {
        echo "<tr>";
        echo "<td>" . date("m/d/Y", $line['date']) . "</td>";
        echo "<td>" . $line['name'] . "</td>";
        echo "<td class='dollars'>" . $numFmt->formatCurrency($line['amount_cents'] / 100, 'USD') .  "</td>";
        echo "<td>" . getSignedDollarString($line['total_cents']) . "</td>";
        echo "<tr>";
    }
    echo "</table></div>";
}