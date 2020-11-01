<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: sign-out.php");
    die;
}

require_once "connect-db.php";
require_once "db-helper.php";
require_once 'helper-functions.php';

if (isset($_POST['create'])) {
    unset($_SESSION['projectionId']);
    unset($_SESSION['projectionName']);
    $projectionName = htmlspecialchars($_POST['create-projection-name']);
    $projectionId = createProjection($db, $_SESSION['username'], $projectionName);
} else {
    $projectionId = htmlspecialchars($_POST['projection-id']);
}
$username = $_SESSION['username'];
$projectionDetails = getProjectionDetailsById($db, $projectionId);
if ($projectionDetails['user_id'] != getUserId($db, $username)) {
    header("Location: sign-out.php");
    die;
}
$projectionName = $projectionDetails['name'];

$_SESSION['projectionId'] = $projectionId;
$_SESSION['projectionName'] = $projectionName;
$projectionName =  $_SESSION['projectionName'];

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
    <!--    <link rel="stylesheet" type="text/css" href="../03-prove/assign04.css">-->
    <!--    <link rel="stylesheet" type="text/css" href="../03-prove/assign08.css">-->
    <link rel="stylesheet" type="text/css" href="assign07.css">
    <link rel="stylesheet" type="text/css" href="financial-projector.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

    <script src="edit-projection.js"></script>
</head>
<body>
<div id="primary-div">
    <h1>Financial Projector</h1>
    <h2>Edit Projection: <?php echo $projectionName; ?></h2>

</div>
<div class="small-div">
    <h1>Create/Edit Entry</h1>
    <form id="create-edit-entry" action="insert-or-edit-entry.php" method="post">
        <input id="hidden-form-entry-id" type="hidden">
        Title<br><input id="name" class="wide-input-field" type="text" name="name"><br>

        <label for="type">Type</label>
        <select id="type" class="input-field" name="type">
            <option value="expense">expense</option>
            <option value="income">income</option>
            <option value="checking" selected="selected" >checking account</option>
            <option value="savings">savings account</option>
        </select>

        <div id="income-or-expense-div">
            <label for="start-date">Date</label>
            <input id="start-date" class="input-field date-input" type="text" name="start-date">

            <br>
            <input type="checkbox" id="repeats-checkbox" name="repeats-checkbox" value="does-repeat">
            <label for="repeats-checkbox">repeats</label>
            <span id="repeats-span">
                every <input type="number" class="input-field" name="repeat_frequency" min="1" max="365" value="1">

                <select id="repeat-interval" class="input-field" name="repeat-interval">
                    <option value="days">days</option>
                    <option value="weeks">weeks</option>
                    <option value="months" selected="selected">months</option>
                    <option value="years">years</option>
                </select>
            </span>

            <br>
            <input type="checkbox" id="ends-checkbox" name="ends-checkbox">
            <label for="ends-checkbox">ends</label>
            <span id="ends-span">
            on <input id="end-date" class="input-field date-input" type="text" name="end-date"><br>
            </span>
        </div>
        <br>
        <label for="amount">Amount $</label>
        <input id="amount" class="input-field" type="text" name="amount">
        <p id="amount-feedback" class="feedback"></p><br>
        <input id="create-edit" type="submit" class='button' value="Create">
<!--        <input id="create-edit" type="submit" class='button' value="Create/Edit">-->
    </form>
</div>
<div id="secondary-div">
    <p><a class='button' href='view-projection.php'>Generate Projection</a></p>
    <h1 id="entries-header">Entries</h1>
    <div id='entries'><?php printNiceEntries($entries, $bankAccounts); ?></div>
</div>
<script>
    hideCorrectDivs();
    $('select').on("change", hideCorrectDivs);
    $('select').on("load", hideCorrectDivs);
    $("input[type='checkbox']").on("click", hideCorrectDivs);
    $('#create-edit-entry').on('submit', function(e) {
        e.preventDefault(); // prevent native submit
        $.post("insert-or-edit-entry.php", $('#create-edit-entry').serialize(), function (data) {
            $('#entries').html(data);
        })

    });
</script>
</body>
