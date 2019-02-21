function validatePassword() {
  var password1 = document.getElementById("pass1").value;
  var password2 = document.getElementById("pass2").value;
  var text1 = document.getElementById("password_text1");
  var text2 = document.getElementById("password_text2");
  if (password1.length < 7 || !(/\d/.test(password1)) {
    text1.style.display = "block";
  }
  else {
    text1.style.display = "none";
  }
  if (password1 != password2) {
    text2.style.display = "block";
  } else {
    text2.style.display = "none";
  }
}
