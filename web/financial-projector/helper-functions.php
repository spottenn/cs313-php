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
    echo "<td>" . $entry['name'] . "</td>";
    echo "<td>" . $entry['entry_type'] . "</td>";
    echo "<td>" . $entry['start_date'] . "</td>";

    echo "<td><input type='checkbox'";
    if ($entry['repeats'] != 'once') {
        echo 'checked';
    }
    echo "></td>";

    echo "<td>every " . $entry['repeat_frequency'] . " ". $entry['repeats'] . "</td>";
    echo "<td>" . $entry['end_date'] . "</td>";

    echo "<td>";
    if ($entry['entry_type'] == "income") {
        echo "+";
    } else {
        echo "-";
    }
    echo centsToCurrencyString($entry['amount_cents']). "</td>";
    echo "<td><button class='button small-button'>edit</button><button class='button small-button'>delete</button></td>";
    echo "</tr>";
}

function printNiceEntries($entries, $bankAccounts)
{
    echo "<table><tr>";
    echo "<th>Title</th>";
    echo "<th>Type</th>";
    echo "<th>Starts</th>";
    echo "<th>Repeats?</th>";
    echo "<th>How Often?</th>";
    echo "<th>Ends on</th>";
    echo "<th>Amount</th>";
    echo "<th></th>";
    echo "</tr>";
    foreach ($bankAccounts as $bankAccount) {
        echo "<tr>";
        echo "<td>" . $bankAccount['name'] . "</td>";
        echo "<td>" . $bankAccount['type'] . " account</td>";
        echo "<td></td>";
        echo "<td></td>";
        echo "<td></td>";
        echo "<td></td>";
        echo "<td>+$" . $bankAccount['amount_cents'] / 100 . "</td>";
        echo "<td><button class='button small-button'>edit</button><button class='button small-button'>delete</button></td>";
        echo "</tr>";
    }
    foreach ($entries as $entry) {
        printNiceEntry($entry);
    }
    echo "</table>";
}

function printNiceProjectionTable($projectionLines)
{
    echo "<div id='secondary-div'><table><tr>";
    echo "<th>Date</th>";
    echo "<th>Name</th>";
    echo "<th>Type</th>";
    echo "<th>Amount</th>";
    echo "<th>Balance</th>";
    echo "</tr>";
    foreach ($projectionLines as $line) {
        echo "<tr>";
        echo "<td>" . date("m/d/Y", $line['date']) . "</td>";
        echo "<td>" . $line['name'] . "</td>";
        echo "<td>" . $line['type'] . "</td>";
        echo "<td class='currency'>" . centsToCurrencyString($line['amount_cents'], 'en_US', 'USD') .  "</td>";
        echo "<td class='currency'>" . centsToCurrencyString($line['total_cents'], 'en_US', 'USD') . "</td>";
        echo "<tr>";
    }
    echo "</table></div>";
}

function centsToCurrencyString ($cents, $locale ="en_us",  $currency = "USD") {
    $numFmt = new NumberFormatter($locale, NumberFormatter::CURRENCY);
    return $numFmt->formatCurrency($cents / 100, $currency);
}

