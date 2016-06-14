$(document).ready(function(){
//  ../images relative
//  /images   absolute 
 
  
  $('.modal-trigger').leanModal({
         dismissible: true, // Modal can be dismissed by clicking outside of the modal
      opacity: .5, // Opacity of modal background
      in_duration: 300, // Transition in duration
      out_duration: 200, // Transition out duration
      complete: function() { $('.displayRecord tr').remove(); } // Callback for Modal close
  });

  $('.regEmp').click(function(e) {
    e.preventDefault();
    $('.spinnerLoaderDash').show();
      $.ajax({
        type: 'get',
        url: base_url + 'admin/getRegisteredEmployee',
        data: {},
        success: function(data) {
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
              $('.displayRecord').html(html);
              $('.displayRecord').data('next-page', url);
                 var page = $('.displayRecord').data('next-page');
                      if (page == null) {
                        $('.spinnerLoaderDash').hide();            
                      }
        }
      });
  });
  $('.pendEmp').click(function(e) {
    e.preventDefault();
    $('.spinnerLoaderDash').show();
       $.ajax({
              type: 'get',
              url: base_url + 'admin/getPendingEmployee',
              data: {},
              success: function(data) {
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
                    $('.displayRecord').html(html);
                    $('.displayRecord').data('next-page', url);
                     var page = $('.displayRecord').data('next-page');
                        if (page == null) {
                          $('.spinnerLoaderDash').hide();
                        }
              }
        });
    });


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