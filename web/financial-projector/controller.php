<?php
require_once 'connect-db.php';
require_once 'db-helper.php';
require_once 'helper-functions.php';

if (isset($_POST['action'])){
    $action = htmlspecialchars($_POST['action']);
}
switch ($action) {
    case 'getEditEntryForm':

        getCreateEditEntryForm($_POST['entryId']);
}
