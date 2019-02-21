function validatePassword() {
  var password1 = document.forms["create_user"]["password1"].value;
  var password2 = document.forms["create_user"]["password2"].value;
  var text = document.getElementById("password_text");
  if (password1 != password2) {
    text.style.display = "inline";
  } else {
    text.style.display = "none";
  }
}
