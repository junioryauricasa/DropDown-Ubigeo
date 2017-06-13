<?php
include_once('db_connect.php');

if(isset($_POST['cid'])) {
    // fetch state details
    $stmt = $pdo->prepare("SELECT * FROM state WHERE country_id=:cid ORDER BY state_name ASC");
    $stmt->execute(array(':cid' => $_POST['cid']));
    echo '<option value="0">Select State</option>';
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo '<option value="' . $row['state_id'] . '">' . $row['state_name'] . '</option>';
    }
}

if(isset($_POST['sid'])) {
    // fetch city details
    $stmt = $pdo->prepare("SELECT * FROM city WHERE state_id=:sid ORDER BY city_name ASC");
    $stmt->execute(array(':sid' => $_POST['sid']));
    echo '<option value="0">Select City</option>';
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo '<option value="' . $row['city_id'] . '">' . $row['city_name'] . '</option>';
    }
}
?>