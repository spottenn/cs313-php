<?php
session_start();
$sessionbackup = $_SESSION;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Confirmation</title>
    <link rel="stylesheet" type="text/css" href="assign04.css">
    <link rel="stylesheet" type="text/css" href="assign08.css">
</head>
<body>
<?php
session_unset();
include "header-and-sidebar.php";
$_SESSION = $sessionbackup;
?>
<article>
    <h1>Confirmation</h1>
    <h2>Address</h2>
    <?php
    $cleanForm = [];
    foreach ($_POST as $key => $value) {
        $cleanForm[htmlspecialchars($key)] = htmlspecialchars($value);
    }
    echo "<p>" . $cleanForm["name"];
    echo "<p>" . $cleanForm["address-line-1"];
    echo "<p>" . $cleanForm["address-line-2"];
    echo "<p>" . $cleanForm["city"] . ", " . $cleanForm["state"] . " " . $cleanForm["zip"];
    ?>
    <br>
    <h2>Order</h2>
    <table id="form-table">
        <?php
        $total = 0;
        foreach ($_SESSION as $item => $details) {
            $price = $details["price"];
            $qty = $details["qty"];
            echo "<tr><td>" . $item . "</td><td>$" . $price . "</td><td>Qty. " . $qty .  "</td></tr>";
            $total += $price * $qty;
        }
        ?>
    </table>
    <p>Total: $<?php echo $total; ?></p>
</article>
</body>
</html>
<?php
session_unset();
?>