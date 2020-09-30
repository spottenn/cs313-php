<html>

<body>
Name: <?php echo $_POST["name"]; ?> <br>
Email: <a href="mailto:<?php echo $_POST['email']; ?>"><?php echo $_POST['email']; ?></a> <br>
Major: <?php echo $_POST["Major"]; ?> <br>
Comments: <?php echo $_POST["Comments"]; ?> <br>
Continents:
<?php
$continentsabr = array(
    "NA" => "North America",
    "SA" => "South America",
    "EU" => "Europe",
    "AS" => "Asia",
    "AU" => "Australia",
    "AF" => "Africa",
    "AN" => "Antarctica",
);
foreach ($_POST['continents'] as $value) {
    echo $continentsabr["$value"] . "<br>";
}
?>

</body>
</html>

