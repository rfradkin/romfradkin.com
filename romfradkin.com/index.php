<html>
<script src="redir.js"></script>
<head>
<title>Test PHP Connection Script</title>
</head>
<body>


<h3>Welcome to the PHP Connect Test</h3>
<a href='./index1.html'>link text</a>

<form action="welcome.php" method="post">
First Name: <input type="text" name="firstname"><br>
Last Name: <input type="text" name="lastname"><br>
E-mail: <input type="text" name="email"><br>
<input type="submit">
</form>

<!-- <?php
// echo $_POST['subject'];
$servername = "romfradkin.com";
$username = "rfradkin";
$password = "lakeowego19";
$dbname = "testdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// // sql to create table
// $sql = "CREATE TABLE MyGuests (
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     firstname VARCHAR(30) NOT NULL,
//     lastname VARCHAR(30) NOT NULL,
//     email VARCHAR(50),
//     reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
//     )";
    
//     if ($conn->query($sql) === TRUE) {
//       echo "Table MyGuests created successfully";
//     } else {
//       echo "Error creating table: " . $conn->error;
//     }

// For input
// Hello World
// Input section
// $a = 10
// $a = (int)readline('Enter an integer: ');
 
// // $b = 9.78
// $b = (float)readline('Enter a floating'
//             . ' point number: ');
 
// // Entered integer is 10 and
// // entered float is 9.78
// echo "Entered integer is " . $a
//     . " and entered float is " . $b;

// $sql = "INSERT INTO MyGuests (firstname, lastname, email)
// VALUES ('John', 'Doe', 'john@example.com')";

// if ($conn->query($sql) === TRUE) {
//   echo "New record created successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . $conn->error;
// }

$conn->close();
?> -->
<p>here</p>
</body>
</html>