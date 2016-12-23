<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$server = 'localhost';
$user = 'root';
$pwd= 'CoolCow009!@';
$db = 'frogpond';

$name = $_GET['frog_name'];
$dob = $_GET['dob'];
$gender = $_GET['gender'];
$batchID = $_GET['batch_ID'];
/*
    //Procedural MySQLi
    $conn = mysqli_connect($server, $user, $pwd, $db);
    if (!$conn) {
        die('Could not connect: ' . mysqli_error($con));
    }

    $sql = "INSERT INTO frogs (frogName, dateOfBirth, gender, batchID) VALUES ('".$name."','".$dob."','".$gender."',".$batchID.")";

    if (mysqli_query($conn, $sql)) {
        $last_id = mysqli_insert_id($conn);
        echo "<b>".$name."</b> successfully added! FrogID = <b>".$last_id."</b>";
    } else {
        echo "<span style=color:red><b>" .$sql ."</b><br>" .mysqli_error($conn) ."</span>";
    }
*/
//Object-Oriented MySQLi
$conn = new mysqli($server, $user, $pwd, $db);
if ($conn->connect_error) {
    die('Could not connect: ' . $conn->connect_error);
}

$stmt = $conn->prepare("INSERT INTO frogs (frogName, dateOfBirth, gender, batchID) VALUES (?, ?, ?, ?)");
$stmt->bind_param("sssi", $name, $dob, $gender, $batchID);
if ($stmt->execute()) {
    $last_id = mysqli_insert_id($conn);
    echo "<b>".$name."</b> successfully added! FrogID = <b>".$last_id."</b>";
    echo "<p> <button type=\"button\" onClick=\"history.go(-1);return true;\">Back</button> </p>";
    //echo $_SERVER['HTTP_REFERER'];
} else {
    echo "<span style=color:red>" .mysqli_error($conn) ."</span>";
}
$stmt->close();
$conn->close();
?>
</body>
</html>
