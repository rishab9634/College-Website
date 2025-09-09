<?php
// Database Connection
$conn = new mysqli("localhost", "rishab", "password", "college_db");

// Check connection
if($conn->connect_error){
    die("Connection Failed: " . $conn->connect_error);
}

// Fetch student data
$result = $conn->query("SELECT * FROM students");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Dashboard</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<header>
<img src="images/logo.png" alt="College Logo" class="logo">
<nav>
<ul>
<li><a href="index.html">Home</a></li>
<li><a href="about.html">About</a></li>
<li><a href="contact.html">Contact</a></li>
<li><a href="dashboard.php">Dashboard</a></li>
</ul>
</nav>
</header>

<section class="dashboard">
<h1>Student Dashboard</h1>
<table border="1">
<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Course</th>
</tr>

<?php
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo "<tr>
        <td>". $row['id'] ."</td>
        <td>". htmlspecialchars($row['name']) ."</td>
        <td>". htmlspecialchars($row['email']) ."</td>
        <td>". htmlspecialchars($row['course']) ."</td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='4'>No Students Found</td></tr>";
}
$conn->close();
?>
</table>
</section>

<footer>
<p>&copy; 2025 ABC College. All Rights Reserved.</p>
</footer>

</body>
</html>
