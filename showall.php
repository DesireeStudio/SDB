<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="sdcss.css" type="text/css">
<title>
SD Entries
</title>
</head>
<body>
  <div class="container">
<?php
include("header.html");

function dbSelect(){
$conn = new mysqli("localhost", "website_user", "my*pass", "songs");
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sqlQuery = "SELECT * FROM song_entries;";
$result = $conn->query($sqlQuery);
if ($result->num_rows > 0) {
echo "<main>";
echo "<table>";
echo "<tr><th class='idcol'></th>";
echo "<th class='namecol'>Name:</th>";
echo "<th class='songcol'>Song Title:</th>";
echo "<th class='albumcol'>Song Album:</th>";
echo "<th class='genrecol'>Song Genre:</th></tr>";
  while($row = $result->fetch_assoc()) {
    echo "<tr><td class='idcol'>" . $row['song_id'] . "</td><td class='namecol'>" . $row['first_name'] . " " . $row['last_name'] . "</td>";
    echo "<td class='songcol'>" . $row['song_title'] . "</td><td class='albumcol'>" . $row['song_album']  . "</td><td class='genrecol'>" .  $row['song_genre'] . "</td></tr>";
  }
echo "</table>";
echo "</main>";
} else {
  echo "0 results";
}
$conn->close();

}

dbSelect();

?>
</div>
</body>
</html>
