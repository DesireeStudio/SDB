function formVal() {

  var fName = document.getElementById("fname");
  var lName = document.getElementById("lname");
  var title = document.getElementById("title");
  var genre = document.getElementById("genre");
  var album = document.getElementById("album");

  var submit = document.getElementById("bookForm");

fName.onblur = function() {nameVal(fName, "fname", "This is not a valid First name!")};
lName.onblur = function() {nameVal(lName, "lname", "This is not a valid Last name!")};
title.onblur = function() {nameVal(title, "title", "This is not a valid Song Title!")};
genre.onblur = function() {nameVal(genre, "genre", "This is not a valid genre!")};
album.onblur = function() {nameVal(album, "album", "This is not a valid album!")};

}

function nameVal(inputName, id, message) {
  var regex = /^[A-Z .'!?#]{2,40}$/g;
  var name = inputName.value.toUpperCase();
  var err = document.getElementById("err_" + id);
  if (!regex.test(name) || name == "") {
    err.innerHTML = message;
    inputName.style.backgroundColor = "yellow";
    inputName.style.borderColor = "#ff0000"
    return false;
  } else {
    err.innerHTML = "";
    inputName.style.backgroundColor = "";
    inputName.style.borderColor = ""
    return true;
  }
}


if (window.addEventListener) {
    window.addEventListener("load", formVal);
} else if (window.attachEvent) {
    window.attachEvent("onload", formVal, false);
}
