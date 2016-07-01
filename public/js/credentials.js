$(document).ready(function(){
//  $('select').material_select();
  $('.loginError').hide();
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
        } else if ( response == '3' ) {
          window.location.href = window.location.href = '/home';
        }
        else {
          $('.loginError').fadeIn().find('p').text('Incorrect Username or Password');
          $('.frmLogin').parent().addClass('shake animated');
          setTimeout(function(){
            $('.frmLogin').parent().removeClass('shake animated');
          }, 500);
          $(this).siblings().val('');

        }
      }
    });
  });
  $('.frmRegistration').submit(function(e){
    e.preventDefault();
        $('.error').text('');
        var empno = $('.empno').val(),
            username = $('.username').val(),
            fullname = $('.fullname').val(),
            email = $('.email').val(),
            password = $('.password').val(),
            password_confirmation = $('.password_confirmation').val(),
            gender = $('.gender option:selected').text(),
            department = $('.department option:selected').text(),
            position = $('.position option:selected').text(),
            userlevel = $('.position').val();
        $.ajax({
          type : 'post',
          url  : base_url + 'saveData',
          data :  { 
              "empno": empno,
              "username" : username,
              "fullname" : fullname,
              "email" : email,
              "password" : password,
              "password_confirmation" : password_confirmation,
              "gender" : gender,
              "department" : department,
              "position" : position,
              "userlevel" : userlevel,
                  } ,
          success : function(response) {
            if (response == 'Register') {
              $("html, body").animate({ scrollTop: $(document).height() }, 10);
              $('.approval').fadeIn().text('Wait for the Approval of the Admin of this Site');
              setInterval(function(){
                window.location.href = window.location.href = '/login';
              }, 1500);
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
  $('.department').change(function() {
    var departmentid = $(this).find(':selected').data('key');
    var html = '';
    $.ajax({
      type: 'get',
      url: base_url + 'getPosition',
      data: {"departmentid": departmentid},
      success: function(data) {
          var dataPos = data.position;
          var loop = dataPos.length;
          for(x=0; x<loop; x++) {
            html += '<option value=""></option>';
            html += '<option value="' + dataPos[x].userlevel + '">' + dataPos[x].positionname + '</option>';
          }
        console.log(html);
        $('#position').html(html);
      }
    });
  });
});