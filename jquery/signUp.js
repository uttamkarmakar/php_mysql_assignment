var pass = document.getElementById("pass");
var conpass = document.getElementById("cpass");
var msg = document.getElementById("message");
var str = document.getElementById("strength");
var conmsg = document.getElementById("conpass");
var username = document.getElementById("user");
var namemsg = document.getElementById("namemsg");

pass.addEventListener('input', () => {
  if (pass.value.length > 0) {
    msg.style.display = "block";
  } else {
    msg.style.display = "none";
  }


  if (pass.value.length < 4) {
    str.innerHTML = " weak x";
    pass.style.borderColor = "#ff5925";
    msg.style.color = "#ff5925";
  } else if (pass.value.length >= 4 && pass.value.length < 8) {
    str.innerHTML = " medium";
    pass.style.borderColor = "yellow";
    msg.style.color = "yellow";
  } else if (pass.value.length > 8) {
    str.innerHTML = " strong &#10004";
    pass.style.borderColor = "green";
    msg.style.color = "green";
  }

});

username.addEventListener('keydown', () => {
  if (username.value.length < 1) {
    namemsg.style.display = "block";
    namemsg.innerHTML = "**Name should be atleast 2 alphabets long";
  } else if (username.value.length > 1) {
    namemsg.style.display = "none";
  } else if (username.value.length === 0) {
    namemsg.style.display = "block";
    namemsg.innerHTML = "**Name should be atleast 2 alphabets long";
  }
});

function checkPasswordMatch() {
  var password = $("#pass").val();
  var confirmPassword = $("#cpass").val();
  if (password != confirmPassword)
    $("#CheckPasswordMatch").html("Passwords does not match!");
  else
    $("#CheckPasswordMatch").html("Passwords matches.");
} 
$(document).ready(function () {
  $("#cpass").keyup(checkPasswordMatch);
});