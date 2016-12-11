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

function nameVal($input) {
    $regex = "/^[A-Z .'!?#]{2,40}$/i";
    $data = $_POST[$input];
  if ($data != "" && isset($data) && preg_match_all($regex, $data)) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = (string) $data;
    return $data;

  } else {
      return false;
  }
}


function dbSelect(){
$conn = new mysqli("localhost", "website_user", "my*pass", "songs");
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sqlQuery = "SELECT * FROM song_entries ORDER BY song_id DESC LIMIT 1;";
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

function dbInsert($fname, $lname, $title, $album, $genre){
  $conn = new mysqli("localhost", "website_user", "my*pass", "songs");
  if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("INSERT INTO song_entries (first_name, last_name, song_title, song_album, song_genre) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $firstName, $lastName, $tItle, $aLbum, $gEnre);

$firstName = $fname;
$lastName = $lname;
$tItle = $title;
$aLbum = $album;
$gEnre = $genre;
$stmt->execute();

echo "New records created successfully";

$stmt->close();
$conn->close();

}

if (isset($_POST['formsubmit'])) {

$fname = nameVal("fname");
$lname = nameVal("lname");
$title = nameVal("title");
$album = nameVal("album");
$genre = nameVal("genre");

if ($fname && $lname && $title && $album && $genre) {

  dbInsert($fname, $lname, $title, $album, $genre);
  dbSelect();

} else {
    $array = ["$fname", "$lname", "$title", "$album", "$genre"];
    $dataNames = ["First name", "Last name", "Song Title", "Song Album", "Song Genre"];
    $i = 0;
    foreach ($array as $data) {
      if (!$data) {
        echo "<p>This is not a valid ($dataNames[$i]) !<br>";
        echo "Please go back and fill out the field correctly!</p>";
        $i++;
      }
  }
}
} else {
  echo "<p>You failed to submit the form</p>";
}


?>
</div>
</body>
</html>
