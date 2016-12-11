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
?>
<main>
<p>
  Use this field to search for the book you need by title.
</p>
<form action="searchartist.php" method="post" id="songform">
  <fieldset>
  <input type="search" name="search" id="search" placeholder="Search...">
  <input type="submit" id="submit"  name="songsearch">
   <em id="err_search"></em>
 </fieldset>
</form>
<br/>
<?php
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
function dbSelect($data){
$conn = new mysqli("localhost", "website_user", "my*pass", "songs");
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sqlQuery = "SELECT * FROM song_entries WHERE CONCAT(first_name, last_name) LIKE '%$data%';";
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

} else {
  echo "0 results";
}
$conn->close();

}
if (isset($_POST['songsearch'])) {
  $data = nameVal("search");
  dbSelect($data);

} else {
    echo "<p>You failed to submit the a search criteria</p>";
}


?>
</main>
</div>
<script src="search.js"></script>
</body>
</html>
