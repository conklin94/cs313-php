function validatePassword() {
  var password1 = document.getElementsById("pass1").value;
  var password2 = document.getElementsById("pass2").value;
  var text = document.getElementById("password_text");
  if (password1 != password2) {
    text.style.display = "inline";
  } else {
    text.style.display = "none";
  }
  alert(password1 + " " + password2);
}
