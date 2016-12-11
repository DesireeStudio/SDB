function formVal() {
  var search = document.getElementById("search");

  search.onblur = function() {nameVal(search, "search", "This is not a valid Song Artist!")};

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
