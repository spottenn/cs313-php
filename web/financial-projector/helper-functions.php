<?php
function getSignedDollarString($signedCents)
{
    $string = "";
    if ($signedCents > 0) {
        $string .= "+";
    } else {
        $string .= "-";
    }
    $cents = abs($signedCents);
    $string .= "$" . $cents / 100;
    return $string;
}

function getEntrySignedCents($entry)
{
    $cents = $entry['amount_cents'];
    if ($entry['entry_type'] == "expense") {
        $cents *= -1;
    }
    return $cents;
}

function printNiceEntry($entry)
{
    echo "<tr id='" . $entry['id'] .  "-tr' class='entry, " . $entry['entry_type'] . "'>";
    echo "<td>" . $entry['name'] . "</td>";
    echo "<td>" . $entry['entry_type'] . "</td>";
    echo "<td>" . $entry['start_date'] . "</td>";

    echo "<td><input type='checkbox'";
    if ($entry['repeats'] != 'once') {
        echo 'checked';
    }
    echo "></td>";

    echo "<td>every " . $entry['repeat_frequency'] . " " . $entry['repeats'] . "</td>";
    echo "<td>" . $entry['end_date'] . "</td>";

    echo "<td>";
    if ($entry['entry_type'] == "income") {
        echo "+";
    } else {
        echo "-";
    }
    echo centsToCurrencyString($entry['amount_cents']) . "</td>";
//    echo "<td><button class='button small-button'>edit</button>";
    echo "<td>";
    echo "<button class='button small-button' onclick='deleteEntry(" . $entry['id'] . ",\"entry\")'>delete</button></td>";
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
        echo "<tr id='" . $bankAccount['id'] .  "-tr' >";
        echo "<td>" . $bankAccount['name'] . "</td>";
        echo "<td>" . $bankAccount['type'] . " account</td>";
        echo "<td></td>";
        echo "<td></td>";
        echo "<td></td>";
        echo "<td></td>";
        echo "<td>+$" . $bankAccount['amount_cents'] / 100 . "</td>";
        echo "<td>";
//        echo "<td><button class='button small-button' onclick='editEntry(" . $bankAccount['id'] . ")'>edit</button>";
        echo "<button class='button small-button' onclick='deleteEntry(" . $bankAccount['id'] . ",\"bank\")'>delete</button></td>";
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
        echo "<td class='currency'>" . centsToCurrencyString($line['amount_cents'], 'en_US', 'USD') . "</td>";
        echo "<td class='currency'>" . centsToCurrencyString($line['total_cents'], 'en_US', 'USD') . "</td>";
        echo "<tr>";
    }
    echo "</table></div>";
}

function centsToCurrencyString($cents, $locale = "en_us", $currency = "USD")
{
    $numFmt = new NumberFormatter($locale, NumberFormatter::CURRENCY);
    return $numFmt->formatCurrency($cents / 100, $currency);
}


function getCreateEditEntryForm($db, $id, $entryType)
{
//    $entry = getEntrySingle($db, $id, $entryType);
//    echo "<form id=\"create-edit-entry\" action=\"insert-or-edit-entry.php\" method=\"post\">
//        <input id=\"hidden-form-entry-id\"type=\"hidden\">
//        Title<br><input id=\"name\" class=\"wide-input-field\" type=\"text\" name=\"name\"><br>
//
//        <label for=\"type\">Type</label>
//        <select id=\"type\" class=\"input-field\" name=\"type\">";
//    if (isset($entry['entry_type'])) {
//        $type = $entry['entry_type'];
//        $values = array (
//          'type' => $type;
//        );
//    } elseif (isset($entry['type'])) {
//        $type = $entry['type'];
//    }
//    $typeSelectedStrings = array("expense" => "", "income" => "", "checking" => "", "savings" => "",);
//    foreach ($typeSelectedStrings as $key => $value) {
//        if ($type == $key) {
//            $typeSelectedStrings[$key] = "selected=\"selected\"";
//        }
//    }
//    echo "<option value=\"expense\"" .  $typeSelectedStrings['checking'] . ">expense</option>
//            <option value=\"income\"" .  $typeSelectedStrings['checking'] . ">income</option>
//            <option value=\"checking\"" .  $typeSelectedStrings['checking'] . ">checking account</option>
//            <option value=\"savings\"" .  $typeSelectedStrings['checking'] . ">savings account</option>";
//    echo "</select>
//
//        <div id=\"income-or-expense-div\">
//            <label for=\"start-date\">Date</label>
//            <input id=\"start-date\" class=\"input-field date-input\" type=\"text\" name=\"start-date\">
//
//            <br>
//            <input type=\"checkbox\" id=\"repeats-checkbox\" name=\"repeats-checkbox\" value=\"does-repeat\">
//            <label for=\"repeats-checkbox\">repeats</label>
//            <span id=\"repeats-span\">
//                every <input type=\"number\" class=\"input-field\" name=\"repeat_frequency\" min=\"1\" max=\"365\" value=\"1\">
//
//                <select id=\"repeat-interval\" class=\"input-field\" name=\"repeat-interval\">
//                    <option value=\"days\">days</option>
//                    <option value=\"weeks\">weeks</option>
//                    <option value=\"months\" selected=\"selected\">months</option>
//                    <option value=\"years\">years</option>
//                </select>
//            </span>
//
//            <br>
//            <input type=\"checkbox\" id=\"ends-checkbox\" name=\"ends-checkbox\">
//            <label for=\"ends-checkbox\">ends</label>
//            <span id=\"ends-span\">
//            on <input id=\"end-date\" class=\"input-field date-input\" type=\"text\" name=\"end-date\"><br>
//            </span>
//        </div>
//        <br>
//        <label for=\"amount\">Amount $</label>
//        <input id=\"amount\" class=\"input-field\" type=\"text\" name=\"amount\">
//        <p id=\"amount-feedback\" class=\"feedback\"></p><br>
//        <input id=\"create-edit\" type=\"submit\" class='button' value=\"Create/Edit\">
//    </form>";


}