<!--
<html>
<head>
<script>
function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","getuser.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>
</head>
<body>

<form>
<select name="users" onchange="showUser(this.value)">
  <option value="">Select a person:</option>
  <option value="1">Peter Griffin</option>
  <option value="2">Lois Griffin</option>
  <option value="3">Joseph Swanson</option>
  <option value="4">Glenn Quagmire</option>
  </select>
</form>
<br>
<div id="txtHint"><b>Person info will be listed here...</b></div>

</body>
</html>
Run example »
Code explanation:

First, check if person is selected. If no person is selected (str == ""), clear the content of txtHint and exit the function. If a person is selected, do the following:

Create an XMLHttpRequest object
Create the function to be executed when the server response is ready
Send the request off to a file on the server
Notice that a parameter (q) is added to the URL (with the content of the dropdown list)
The PHP File
The page on the server called by the JavaScript above is a PHP file called "getuser.php".

The source code in "getuser.php" runs a query against a MySQL database, and returns the result in an HTML table:
-->
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

$q = $_GET['q'];

$conn = new mysqli($server, $user, $pwd, $db);
if ($conn->connect_error) {
    die('Could not connect: ' . $conn->connect_error);
}

switch ($q) {
    case 'frog_count':
        $sql = "SELECT count(*) as res FROM frogs WHERE dateOfDeath IS NULL";
        break;
    case 'male_count':
        $sql = "SELECT count(*) as res FROM frogs WHERE gender = 'MALE' AND dateOfDeath IS NULL";
        break;
    case 'female_count':
        $sql = "SELECT count(*) as res FROM frogs WHERE gender = 'FEMALE' AND dateOfDeath IS NULL";
        break;
    case 'healthy_count':
        $sql = "SELECT count(*) as res FROM frogs WHERE health = 'HEALTHY' AND dateOfDeath IS NULL";
        break;
    case 'pod_count':
        $sql = "SELECT matingPods as res FROM pondHealthChecks WHERE pondHealthCheckID = (SELECT max(pondHealthCheckID) FROM pondHealthChecks)";
        break;
    case 'pollution_level':
        $sql = "SELECT pollutionLevel as res FROM pondHealthChecks WHERE pondHealthCheckID = (SELECT max(pondHealthCheckID) FROM pondHealthChecks)";
        break;
    case 'pH_level':
        $sql = "SELECT pHLevel as res FROM pondHealthChecks WHERE pondHealthCheckID = (SELECT max(pondHealthCheckID) FROM pondHealthChecks)";
        break;
    case 'fish_population':
        $sql = "SELECT fishPopulation as res FROM pondHealthChecks WHERE pondHealthCheckID = (SELECT max(pondHealthCheckID) FROM pondHealthChecks)";
        break;
    default:
        # code...
        break;
}
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    echo $row['res'];
}
$conn->close();
?>
</body>
</html>
