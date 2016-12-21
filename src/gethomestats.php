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
$q = $_GET['q'];

$con = mysqli_connect('localhost','root','CoolCow009!@','frogpond');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));

    //this section is to simulate db connection
    switch ($q) {
        case 'frog_count':
            echo '20,000';
            break;
        case 'male_count':
            echo '12,000';
            break;
        case 'female_count':
            echo '8,000';
            break;
        case 'healthy_count':
            echo '18,000';
            break;
        case 'pod_count':
            echo '25';
            break;
        case 'pollution_level':
            echo '2';
            break;
        case 'pH_level':
            echo '6.6';
            break;
        case 'fish_population':
            echo '500';
            break;
        default:
            # code...
            break;
    }
} else { //this section is for an actual db connection
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
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($result)) {
        echo $row['res'];
    }
    mysqli_close($con);
}

/*
$con = mysqli_connect('localhost','peter','abc123','my_db');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM user WHERE id = '".$q."'";
$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th>Firstname</th>
<th>Lastname</th>
<th>Age</th>
<th>Hometown</th>
<th>Job</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['FirstName'] . "</td>";
    echo "<td>" . $row['LastName'] . "</td>";
    echo "<td>" . $row['Age'] . "</td>";
    echo "<td>" . $row['Hometown'] . "</td>";
    echo "<td>" . $row['Job'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);*/
?>
</body>
</html>
