$(document).ready(function(){
  
  $('.chckBx').on( "click", function(){
    var userID = $(this).parent().data('id');
    if ( $(this).is(':checked') ) {
      setActive(userID);
    } else {
      setInActive(userID);
    }
  });
  
    function setActive(userID) {
      var active = 1;
      $.ajax({
        type  : 'post',
        url   : base_url + 'manageaccount/updateActive/' + userID,
        data  : { "checked": active }
      });
    }
    function setInActive(userID) {
    
      var inactive = 0;
      $.ajax({
        type  : 'post',
        url   : base_url + 'manageaccount/updateActive/' + userID,
        data  : { "checked": inactive }
      });
    }
    
    // Pagination
    $('.countpager:first').addClass('active disabled');
  
    $('body').delegate('.prev a','click',function(){
      $('.countpager.active').prev().find('a').click().addClass('active disabled').siblings().removeClass('active disabled');
    });
  
    $('body').delegate('.next a', 'click',function(){
      $('.countpager.active').next().find('a').click().addClass('active disabled').siblings().removeClass('active disabled');
    });
    
    $('body').delegate('.countpager a','click', function(e){
       e.preventDefault();
      $(this).parent().addClass('active disabled').siblings().removeClass('active disabled');
    });

    $('body').on('click', '.pagination a', function(e){
        e.preventDefault();
 
        var nextpage = $('.loadRecord').data('next-page');
        var url = $(this).attr('href');
        if (nextpage != null) {
             $('.spinnerLoader img').show();
                $.get(url, function(data){
                      var nextpage = data.next_page;
                      var prevpage = data.prev_page;
                      var dataEmp = data.employees.data;
                      var loops = dataEmp.length;
                      var html = '';
                      
                      for (x = 0; x < loops; x++) {
                        html += '<tr>';
                        html += '<td>' + dataEmp[x].fullname + '</td>';
                        html += '<td>' + dataEmp[x].email + '</td>';
                        html += '<td>' + dataEmp[x].position + '</td>';
                        html += '<td>' + dataEmp[x].department + '</td>';
                        html += '<td>';
                        html += '<div class="switch">';
                        html += '<label data-id="' + dataEmp[x].id + '">';
                        html += 'Off';
                        html += '<input type="checkbox" class="chckBx"';
                        html += (dataEmp[x].active == 1 ) ? 'checked' : '';
                        html += '>';
                        html += '<span class="lever"></span>';
                        html += 'On';
                        html += '</label>';
                        html += '</div>';
                        html += '</td>';
                        html += '<td>';
                        html += '<div class="reset" data-idr="' + dataEmp[x].id + '"><a href="#"><i class="material-icons">vpn_key</i></a></div>';
                        html += '</td>';
                        html += '</tr>';
                      }
            
                      $('.loadRecord').html(html);
                      $('.spinnerLoader img').hide();
//                      $('.next a').attr('href', nextpage);
//                      $('.prev a').attr('href', prevpage);
//
            
                      if (data.next_page == null) {
                        $('.spinnerLoader img').hide();
                          $('.next').removeClass('active').addClass('disabled');
                      } else {
                          $('.next').removeClass('disabled');
                      }
                        if(data.prev_page == null) {
                          $('.prev').addClass('disabled');
                        }  else {
                          $('.prev').removeClass('disabled');
                      }

                });
            }
    });
  
  $('.searchFrm').keyup(function(){
    var searchFrm = $(this).val();
    $.ajax({
      type: 'get',
      url: base_url + 'manageaccount',
      data: {
        'searchFrm': searchFrm
      },
      success: function(data) {
        var nextpage = data.next_page;
        var prevpage = data.prev_page;
        var dataEmp = data.employees.data;
        var loops = dataEmp.length;
        var html = '';

        for (x = 0; x < loops; x++) {
          html += '<tr>';
          html += '<td>' + dataEmp[x].fullname + '</td>';
          html += '<td>' + dataEmp[x].email + '</td>';
          html += '<td>' + dataEmp[x].position + '</td>';
          html += '<td>' + dataEmp[x].department + '</td>';
          html += '<td>';
          html += '<div class="switch">';
          html += '<label data-id="' + dataEmp[x].id + '">';
          html += 'Off';
          html += '<input type="checkbox" class="chckBx"';
          html += (dataEmp[x].active == 1 ) ? 'checked' : '';
          html += '>';
          html += '<span class="lever"></span>';
          html += 'On';
          html += '</label>';
          html += '</div>';
          html += '</td>';
          html += '<td>';
          html += '<div class="reset" data-idr="' + dataEmp[x].id + '"><a href="#"><i class="material-icons">vpn_key</i></a></div>';
          html += '</td>';
          html += '</tr>';
        }
        $('.result').hide();
        $('.pagination').show();
        $('.loadRecord').html(html);

        var count = data.employees.last_page;
        
        var pager = '';
        pager += '<li class="prev disabled">';
        pager += '<a href="javascript:void(0)">Prev</a>';
        pager += '</li>';
        for (x = 1; x <= count; x++) {
          pager += '<li class="countpager">';
          pager += '<a href=" ' +  base_url + 'manageaccount?searchFrm=' + searchFrm + '&page=' + x + '">' + x +'</a>';
          pager += '</li>';
        }
        pager += '<li class="next">';
        pager += '<a href="javascript:void(0)">Next</a>';
        pager += '</li>';
    
        $('.pagination').html(pager);
        $('.countpager:first').addClass('active disabled');
        $('.spinnerLoader img').hide();
        
        if (data.next_page == null) {
          $('.spinnerLoader img').hide();
          $('.next').removeClass('active').addClass('disabled');
        } else {
          $('.next').removeClass('disabled');
        }
        if(data.prev_page == null) {
          $('.prev').addClass('disabled');
        }  else {
          $('.prev').removeClass('disabled');
        } if (data.employees.total == 0) {
          $('.pagination').hide();
          $('<h1 class="result" style="text-align:center">No Result Found</h1>').insertAfter('.pagerLinks');
        }
      }
    });
    
  });
    
});