$(document).ready(function(){
  $('select').material_select();
  var base_url = 'http://localhost:8000/';
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $('.frmLogin').submit(function(e){
    e.preventDefault();
    var username = $('.username').val(),
        password = $('.password').val();
    $.ajax({
      type : 'post',
      url  : base_url + 'auth',
      data : {'username': username, 'password': password },
      success : function(response) {
        if( response == '1' ) {
          window.location.href = window.location.href = '/admin';
        } else if ( response == '2' ) {
          window.location.href = window.location.href = '/home';
        }
        else {
          $('.loginError').fadeIn();
          $('.frmLogin').parent().addClass('shake animated');
          setTimeout(function(){
            $('.frmLogin').parent().removeClass('shake animated');
            $('.loginError').fadeOut();
          }, 5000);
        }
      }
    });
  });
  $('.frmRegistration').submit(function(e){
    e.preventDefault();
    $('.error').text('');
    $.ajax({
      type : 'post',
      url  : base_url + 'saveData',
      data :  $(this).serialize() ,
      success : function(response) {
        if (response == 'Register') {
          $("html, body").animate({ scrollTop: $(document).height() }, 10);
          $('.approval').fadeIn();
          setInterval(function(){
            window.location.href = window.location.href = '/login';
          }, 5000);
        } else {
          $('body, html').animate({
            scrollTop: 0
          }, 100);
          $('.empError').text(response.empno);
          $('.unameError').text(response.username);
          $('.fullnameError').text(response.fullname);
          $('.emailError').text(response.email);
          $('.passwordError').text(response.password);
          $('.passConfirmError').text(response.password_confirmation);
          $('.genderError').text(response.gender);
          $('.departmentError').text(response.department);
          $('.positionError').text(response.position);
        }
      }
    });
  });
  
  
  
});