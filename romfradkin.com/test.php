<html>
<head>
<title>Test Uzay Status Formatting</title>
</head>
<body>

<?php
# Turn on error reportin to print errors
error_reporting(E_ALL);
ini_set('display_errors', 'On');

$server = "romfradkin.com";
$usern = "rfradkin";
# Is this password secure
$passw = "lakeowego19";
$datab = "testdb";

# Connect to database by creating a new instance of a server connection
$conne = new mysqli($server, $usern, $passw, $datab);

# Check if connect_error is an attribute of conne, if it is
# kill the php program and print the error
if ($conne->connect_error) {
  die("Connection failed: " . $conne->connect_error);
}

# Write a mariadb(or mysql, doesn't matter) query
$maria_query = "SELECT * FROM MyGuests ORDER BY id DESC LIMIT 1";
# Query that using the query function from connection
$resul = $conne->query($maria_query);
# Then get each row using fetch_assoc() function which returns each row from the 
# resul object as an array. Since there is only one row (cause  ORDER BY id DESC LIMIT 1)
# you don't need a while loop. You can run this function only once to get the array
$infor = $resul->fetch_assoc();
# echo the array onto the screen
echo $infor['firstname'].' '.$infor['lastname'].' '.$infor['email'].'<br>';

# Close the connection
$conne->close();
?>


<button onclick="window.location.href='https://romfradkin.com/index1.html';">
    back to main page
  </button>
</body>
</html>