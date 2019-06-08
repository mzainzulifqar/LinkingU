$(document).ready(function(){
		
		$('#submit').click(function() {
   
    var first_name = $('#fname').val();
    var last_name = $('#lname').val();
    var email = $('#email').val();
 var password = $('#password').val();


 
    $(".error").remove();
 
    if (first_name.length < 1) {
      $('#fname').append('<span class="error">This field is required</span>');
    }
    if (last_name.length < 1) {
      $('#lname').append('<span class="error">This field is required</span>');
    }
    if (email.length < 1) {
      $('#email').append('<span class="error">This field is required</span>');
    } 
    else {
      var regEx = /^[A-Z0-9][A-Z0-9._%+-]{0,63}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/;
      var validEmail = regEx.test(email);
      if (!validEmail) {
        $('#email').append('<span class="error">Enter a valid email</span>');
      }
    }
    if (password.length < 8) {
      $('#password').append('<span class="error">Password must be at least 8 characters long</span>');
    }
  });

    //animation


   
     

 
});



