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
<form action="songsubmit.php" method="post" id="songform">
  <fieldset>
    <legend>Artist Information</legend>
      <label for="fname">&nbsp;First Name:</label>
      <br>
      <input id="fname" name="fname" required type="text" placeholder="First Name" value="" pattern="[A-Za-z .'!?]{2,40}"> <em id="err_fname"></em>
      <br>
      <label for="lname">&nbsp;Last Name:</label>
      <br>
      <input id="lname" name="lname" type="text" required placeholder="Last Name" value="" pattern="[A-Za-z .'!?]{2,40}"> <em id="err_lname"></em>
  </fieldset>
    <fieldset>
      <legend>Song Information</legend>
      <label for="title">&nbsp;Song Title:</label>
      <br>
      <input id="title" name="title" required type="text" placeholder="Title of Song" value="" pattern="[A-Za-z .'!?]{2,40}"> <em id="err_title"></em>
      <br>
      <label for="album">&nbsp;Song Album:</label>
      <br>
      <input id="album" name="album" required type="text" placeholder="Album of Song" value="" pattern="[A-Za-z .'!?]{2,40}"> <em id="err_album"></em>
      <br>
      <label for="genre">&nbsp;Song Genre:</label>
      <br>
      <input id="genre" name="genre" required type="text" placeholder="Genre of Song" value="" pattern="[A-Za-z .'!?]{2,40}"> <em id="err_genre"></em>
    </fieldset>

    <fieldset class="submitbutton">
<input type="submit" value="Submit" id="formsubmit" name="formsubmit"> | <input type="reset">
</fieldset>
</form>
</main>
</div>
<script src="validate.js"></script>
</body>
</html>
