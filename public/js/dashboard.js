$(document).ready(function(){
//  ../images relative
//  /images   absolute 
    var page = $('.displayRecord').data('next-page');
        if (page == '') {
                $('.spinnerLoaderDash').hide();            
        }
  
  $('#modal').leanModal();
  function registeredEmployee () {
    $.ajax({
      type : 'post',
      url  : base_url + 'admin/getRegisteredEmployee',
      data : {},
      success : function(response){
        $('.registeredEmp').text(response);
      }
    })
  }
  registeredEmployee();
  function getPendingEmployee () {
    $.ajax({
      type : 'post',
      url  : base_url + 'admin/getPendingEmployee',
      data : {},
      success : function(response){
        $('.pendingEmp').text(response);
      }
    })
  }
  getPendingEmployee();
    $('.regEmployee').scroll(function(){
      var page = $('.displayRecord').data('next-page');
      
      if(page !== null) {

          var divHeight = $('.modal-content').outerHeight(true) - 1 ;
          var offsets = $('.regEmployee').scrollTop() + $('.regEmployee').height();
            if (offsets >= divHeight) {

                    $.get(page, function(data){
                      var url = data.next_page;
                      var dataEmp = data.employees.data;
                      var loops = dataEmp.length;
                      console.log(data)
                      var html = '';
                      
                      for (x = 0; x < loops; x++) {
                        html += '<tr>';
                        html += '<td>' + dataEmp[x].fullname + '</td>';
                        html += '<td>' + moment(dataEmp[x].created_at).format('MMMM Do YYYY, h:mm:ss a') + '</td>';
                        html += '</tr>';
                      }
                      $('.displayRecord').append(html);
                      $('.displayRecord').data('next-page', url);
                      if (data.next_page == null) {
                        $('.spinnerLoaderDash').hide();
                      }
                    });

             }
          } 
        });
  
  function convertDate() {
    $('.regDate').each(function(){
      $(this).text(moment($(this).text()).format('MMMM Do YYYY, h:mm:ss a'));
    });
  }
  convertDate();
});