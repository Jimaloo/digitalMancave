 <?php
    $conn = mysqli_connect("localhost", "root", "", "registration");
 // Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT id, nname, username, phonenumber, email, password FROM users";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["id"]. "</td><td>" . $row["nname"] . "</td><td>"
. $row["username"]. "</td><td>" . $row["phonenumber"]. "</td><td>" . $row["email"]. "</td><td>" . $row["password"]. "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>