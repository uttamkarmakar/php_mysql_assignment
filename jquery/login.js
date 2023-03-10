$("#login-email").keyup(function () {

  var email = $("#login-email").val();
  var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

  if (!filter.test(email)) {
    //alert('Please provide a valid email address');
    $("#error_email").text(email + " is not a valid email");
    email.focus;
    //return false;
  } else {
    $("#error_email").text("");
  }
});
$("#login-submit").click(function () {

  var email = $("#login-email").val();
  var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

  if (!filter.test(email)) {
    document.getElementById("error_email").innerHTML = 'The email address you provide is not valid';
    $("#login-email").focus();
    return false;
  } else {

  }

});

function show_pass(){
  var x= document.getElementById("inputPassword3");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
