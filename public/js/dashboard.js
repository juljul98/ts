$(document).ready(function(){
//  ../images relative
//  /images   absolute
 
  $('.modal-trigger').leanModal({
      dismissible: true,
      opacity: .5,
      in_duration: 300,
      out_duration: 200,
      complete: function() { $('.displayRecord tr').remove(); } // Callback for Modal close
  });
  $('.showEmp').click(function(e) {
    e.preventDefault();
    var trigger = $(this).attr('id');

    if ( trigger == 'regEmployee') {
        var method = 'getRegisteredEmployee';
        $('.modal-title').text('Registered Employee/s');
    } else if (trigger == 'pendEmployee') {
        var method = 'getPendingEmployee';
        $('.modal-title').text('Pending Employee/s');
    } else if (trigger == 'showRecord') {
        var method = 'getRecordByMonth';
        var month = $(this).find('.month').attr('value');
        var year = $('#yearHE').val();
    }

    $('.spinnerLoaderDash').show();
      $.ajax({
        type: 'get',
        url: base_url + 'admin/' + method,
        data: {"month": month, "year": year},
        success: function(data) {
              var url = data.next_page;
              var dataEmp = data.employees.data;
              var loops = dataEmp.length;
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
          var divHeight = $('.modal-content').outerHeight(true) - 1;
          var offsets = $('.regEmployee').scrollTop() + $('.regEmployee').height();
            if (offsets >= divHeight) {
                    $.get(page, function(data){
                      var url = data.next_page;
                      var dataEmp = data.employees.data;
                      var loops = dataEmp.length;

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