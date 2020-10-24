<?php
require_once 'helper-functions.php';
require_once 'db-helper.php';

const repeatTypeToPeriodDesignator = array(
    'days' => 'D', 'weeks' => 'W', 'months' => 'M', 'years' => 'Y'
);


function generateProjection($db, $projectionId)
{
    $projBankAccounts = getBankAccountsForOne($db, $projectionId);
    $projEntries = getEntriesForOne($db, $projectionId);
    $projectionDetails = getProjectionDetailsById($db, $projectionId);
    $projectionLength = "+" . $projectionDetails['length'];
    $projStartDate = new DateTime('today');
    $projEndDate = clone $projStartDate;
    $projEndDate->modify($projectionLength);
    $projEntryLines = array();
    $projLines = array();


    foreach ($projEntries as $entry) {
        if ($entry['end_date'] == NULL) {
            $entryEndDate = clone $projEndDate;
        } else {
            $entryEndDate = new DateTime($entry['end_date']);
        }
        $entryWorkingDate = new DateTime($entry['start_date']);
        $relativeDateString = getEntryRelativeDateTime($entry);

        $entrySignedCents = getEntrySignedCents($entry);
        if ($relativeDateString == null) {
            if ($entryWorkingDate < $projStartDate || $entryWorkingDate > $entryEndDate) {
                // need to handle repeat once past date user errors here.
                continue;
            }
            $projEntryLines[] = array(
                'date' => $entryWorkingDate->getTimestamp(),
                'name' => $entry['name'],
                'type' => $entry['entry_type'],
                'amount_cents' => $entrySignedCents
            );
            continue;
        }
        moveUpEntryDate($entryWorkingDate, $projStartDate, $relativeDateString);
        while ($entryWorkingDate < $entryEndDate) {
            $projEntryLines[] = array(
                'date' => $entryWorkingDate->getTimestamp(),
                'name' => $entry['name'],
                'type' => $entry['entry_type'],
                'amount_cents' => $entrySignedCents
            );
            $entryWorkingDate->modify($relativeDateString);
        }
    }
    usort($projEntryLines, "projEntryLinesDateComparator");

    $totalCents = 0;
    foreach ($projBankAccounts as $account) {
        $totalCents += $account['amount_cents'];
        $projLines[] = array(
            'date' => $projStartDate->getTimestamp(),
            'name' => $account['name'],
            'type' => $account['type'],
            'amount_cents' => $account['amount_cents'],
            'total_cents' => $totalCents
        );
    }

    foreach ($projEntryLines as $entryLine) {
        $totalCents += $entryLine['amount_cents'];
        $entryLine['total_cents'] = $totalCents;
        $projLines[] = $entryLine;
    }
    return $projLines;

}

function moveUpEntryDate($dateToMove, $movePastThisDate, $relativeDateString)
{
    while ($dateToMove < $movePastThisDate) {
        $dateToMove->modify($relativeDateString);
    }
}

function getEntryInterval($entry)
{
    if ($entry['repeats'] == 'once') {
        return null;
    } else {
        $periodDesignator = repeatTypeToPeriodDesignator[$entry['repeats']];
        try {
            return new DateInterval('P' . $entry['repeats_frequency'] . $periodDesignator);
        } catch (Exception $e) {
            return null;
        }
    }
}

function projEntryLinesDateComparator($lineA, $lineB)
{
    return $lineA['date'] - $lineB['date'];
}


function getEntryRelativeDateTime($entry)
{
    if ($entry['repeats'] == 'once') {
        return null;
    }
    return "+" . $entry['repeat_frequency'] . " " . $entry['repeats'];
}