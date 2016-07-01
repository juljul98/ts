$(document).ready(function(){
    
  $('.positionBtn').click(function(e){
    $('.positionPanel').find('input, select').val('');
    e.preventDefault();
      $('.positionPanel').slideToggle(1).toggleClass('active');
    if( $('.positionPanel').hasClass('active') ) {
      $(this).find('i').text('close');
    } else  {
      $('.positionPanel').find('input, select').val('');
      $(this).find('i').text('add');
    }
  });
  
  // Get Role and place it in drop down
  $('#userlevel').change(function(){
    var id  = $(this).val();
    $.ajax({
      type: 'get',
      url: base_url + 'department/getRole',
      data: { "trigger": id },
      success: function(response){
        $('.positionNote span').text(response.description);
      }
    });
  });
  
  // Save Department
  $('.addDepartment').submit(function(e){
    e.preventDefault();
    var departmentname = $('.departmentname').val();
    $.ajax({
      type : 'post',
      url : base_url + 'department/saveDepartment',
      data: { "departmentname" : departmentname },
      success : function(data) {
        if(data == 'Successfully Save') {
          $('.departmentAlertSuccess').show().find('p').text(data);
          getDepartmentNameForPosition();
        }
        else {
          $('.departmentAlertSuccess').hide();
          $('.departmentAlertError').show().find('p').text(data.departmentname);
        }
      }
    });
  });
  
  //save Position
  $('.addPosition').submit(function(e){
    e.preventDefault();
    var departmentname = $('.departmentnameforposition').val(),
        positionname = $('.positionname').val(),
        userlevel = $('.userlevel').val();
    $.ajax({
      type: 'post',
      url : base_url + 'department/savePosition',
      data: {
        'departmentname': departmentname,
        'positionname' : positionname,
        'userlevel' : userlevel
      },
      success : function(data) {
        if (data == 'Successfully Save') {
          $('.positionAlertSuccess').show().find('p').text(data)
          $('.departmentnameforposition').val(null);
          $('.positionname').val(null);
          $('.userlevel').val(null);
        } else {
          $('.positionAlertSuccess').hide();
          $('.positionAlertError.dn').show().find('p').text(data.departmentname);
          $('.positionAlertError.pn').show().find('p').text(data.positionname);
          $('.positionAlertError.ul').show().find('p').text(data.userlevel);
        }
      }
    });
  });
  
  function getDepartmentNameForPosition () {
    var html = '';
    $.ajax({
      type: 'post',
      url: base_url + 'department/getDepartmentNameForPosition',
      data: {},
      success: function(data) {
        var loop = data.length;
        for(x = 0; x<loop; x++) {
          html += '<option value="'+ data[x].keyenc +'">'+ data[x].departmentname +'</option>';
        }
        $('.departmentnameforposition').html(html);
      }
    });
  }
  
  function loadAllRecord() {
    $.ajax({
      type: 'post',
      url: base_url + 'department/getAllRecord',
      data: {},
      success: function(data) {
        console.log(data);
      }
    });
  }
  
  loadAllRecord();
  getDepartmentNameForPosition();
  
});