<?php

$itemName = $_POST["itemName"];
$itemCost = filter_input(INPUT_POST, "itemCost", FILTER_VALIDATE_INT);
$rarity = $_POST["rarity"];
$cursed = filter_input(INPUT_POST, "cursed", FILTER_VALIDATE_INT);
$equippedSlot = $_POST["equippedSlot"];
$charges = filter_input(INPUT_POST, "charges", FILTER_VALIDATE_INT);
$rechargeTime = $_POST["rechargeTime"];
$description = $_POST["description"];
$gimmick = $_POST["gimmick"];
$quantity = filter_input(INPUT_POST, "quantity", FILTER_VALIDATE_INT);


$username = "sql8660698";
$password = "dIewP8bnAd";
$host = "sql8.freesqldatabase.com";
$dbname = "sql8660698";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_error());
}

$sql = "INSERT INTO items (item_name, cost, rarity, cursed, equipped_slot, charges, recharge_time, item_description, gimmick, quantity)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_stmt_init($conn);

if ( ! mysqli_stmt_prepare($stmt, $sql)) {
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "sisisisssi",
$itemName,
$itemCost,
$rarity,
$cursed,
$equippedSlot,
$charges,
$rechargeTime,
$description,
$gimmick,
$quantity);

mysqli_stmt_execute($stmt);

echo "Record saved";