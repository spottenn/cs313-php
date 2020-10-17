<?php
session_start();
require 'connect-db.php';
require 'db-helper.php';

if (isset($_POST['username'])) {
    $_SESSION['username'] = htmlspecialchars($_POST['username']);
    $projections = getProjectionsForOne($db, $_SESSION['username']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Financial Projector - Projections</title>
    <link rel="stylesheet" type="text/css" href="assign07.css">
    <link rel="stylesheet" type="text/css" href="financial-projector.css">
</head>
<body>
<div id="projection-selector">
    <h1>Financial Projector</h1>
    <h2>Your Projections</h2>
    <?php
    if (!isset($_SESSION["username"])) {
        echo "<p>Error: You've been logged out.</p> <a href='financial-projector.php'>Log back In</a>";
    }
    else foreach ($projections as $projection) {
        $queryArray = Array ("username" => $_SESSION["username"], 'projection-name' => $projection['name']);
        echo "<a href='team05scripture.php?";
        echo http_build_query($queryArray);
        echo "'>";
        echo $projection['name'];
        echo '</a><br/>';
    }
    ?>
    <form action="create-projection.php" method="post"> <!--onsubmit="return validateAll()"-->
        Projection<br>
        <input id="projection" class="input-field" type="text" name="projection"><!--oninput="validateName()"-->
<!--        <p id="name-feedback" class="feedback"></p><br>-->
<!--        <p></p>-->
        <input id="sign-in" type="submit" value="Sign In">
    </form>
    <p class="notice">*Please note, your projections are not password protected. Please do not enter any personal information.
        Projections are deleted on the second night after your projection was last edited</p>
</div>
<!--<script>-->
<!--    function validateAll() {-->
<!--        let amountBool = validateAmount();-->
<!--        let termBool = validateTerm();-->
<!--        let aprBool = validateName();-->
<!--        return aprBool && termBool && amountBool;-->
<!--    }-->

<!--    function validateName() {-->
<!--        let field = document.getElementById("projection-name");-->
<!--        let message = "";-->
<!--        if (field.value === "" || isNaN(field.value) || field.value < 0 || field.value > 25) {-->
<!--            message = "Enter a number between 0 and 25";-->
<!--        } else {-->
<!--            field.style.borderColor = "";-->
<!--            document.getElementById("apr-feedback").innerHTML = "";-->
<!--            return true;-->
<!--        }-->
<!--        document.getElementById("apr-feedback").innerHTML = message;-->
<!--        field.style.borderColor = "red";-->
<!--        field.focus();-->
<!--        return false;-->
<!--    }-->

<!--    function validateTerm() {-->
<!--        let field = document.getElementById("term");-->
<!--        let message = "";-->
<!--        if (field.value === "" || isNaN(field.value) || field.value <= 0 || field.value > 40) {-->
<!--            message = "Enter a number between 0 and 40";-->
<!--        } else {-->
<!--            field.style.borderColor = "";-->
<!--            document.getElementById("term-feedback").innerHTML = "";-->
<!--            return true;-->
<!--        }-->
<!--        document.getElementById("term-feedback").innerHTML = message;-->
<!--        field.style.borderColor = "red";-->
<!--        field.focus();-->
<!--        return false;-->
<!--    }-->

<!--    function validateAmount() {-->
<!--        let field = document.getElementById("amount");-->
<!--        let message = "";-->
<!--        if (field.value === "" || isNaN(field.value) || field.value < 0) {-->
<!--            message = "Enter a positive number";-->
<!--        } else {-->
<!--            field.style.borderColor = "";-->
<!--            document.getElementById("amount-feedback").innerHTML = "";-->
<!--            return true;-->
<!--        }-->
<!--        document.getElementById("amount-feedback").innerHTML = message;-->
<!--        field.style.borderColor = "red";-->
<!--        field.focus();-->
<!--        return false;-->
<!--    }-->

<!--    function reset() {-->
<!--        document.getElementById("projection-name").value = "";-->
<!--        document.getElementById("term").value = "";-->
<!--        document.getElementById("amount").value = "";-->
<!--        document.getElementById("amount").style.borderColor = "";-->
<!--        document.getElementById("term").style.borderColor = "";-->
<!--        document.getElementById("projection-name").style.borderColor = "";-->
<!--        document.getElementById("amount-feedback").innerHTML = "";-->
<!--        document.getElementById("term-feedback").innerHTML = "";-->
<!--        document.getElementById("apr-feedback").innerHTML = "";-->
<!--        document.getElementById("projection-name").focus();-->
<!--    }-->

<!--    //event listeners-->
<!--    document.getElementById("create").addEventListener("click", reset)-->
<!--</script>-->
</body>
</html>