<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Financial Projector</title>
    <link rel="stylesheet" type="text/css" href="assign07.css">
    <link rel="stylesheet" type="text/css" href="financial-projector.css">
</head>
<body>
<div id="primary-div"><h1>Financial Projector</h1>
    <form action="projections.php" method="post"> <!--onsubmit="return validateAll()"-->
        Username<br>
        <input id="username" class="wide-input-field" type="text" name="username"><!--oninput="validateName()"-->
<!--        <p id="name-feedback" class="feedback"></p><br>-->
<!--        <p></p>-->
        <input id="sign-in" type="submit" value="Sign In">
        <input id="create" name="create" type="submit" value="Create Account">
    </form>
    <p class="notice">*Please note, your projections are not password protected. Please do not enter any personal information.
        Projections are deleted on the second night after your projection was last edited.</p>
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