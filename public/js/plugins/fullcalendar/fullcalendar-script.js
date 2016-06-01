
  $(document).ready(function() {
    

    /* initialize the external events
    -----------------------------------------------------------------*/
    $('#external-events .fc-event').each(function() {

      // store data so the calendar knows to render an event upon drop
      $(this).data('event', {
        title: $.trim($(this).text()), // use the element's text as the event title
        stick: true, // maintain when user navigates (see docs on the renderEvent method)
        color: '#00bcd4'
      });

      // make the event draggable using jQuery UI
      $(this).draggable({
        zIndex: 999,
        revert: true,      // will cause the event to go back to its
        revertDuration: 0  //  original position after the drag
      });
    });

    /* initialize the calendar
    
    -----------------------------------------------------------------*/
    $.ajax({
      type: 'get',
      url: base_url + 'calendar/getData',
      data: {
        //            "title": title,
        //            "color": color,
        //            "start_date": start_date
      },
      success: function(data) {
        var loop = data.length;
        for( x=0; x < loop; x++ ){
          var colo = data[x].color;
          
        }
        alert(colo);
          

      }
    });
    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,basicWeek,basicDay'
      },
      editable: true,
      droppable: true,
      events: [{
        title : 'any',
        start : '2016-06-06',
        color : '#000'
      }],
 
      drop: function (start, end, allDay, delta) { //Save Data
        var title = $(this).text();
        var color = rgb2hex($(this).css('background-color'));
        var start_date = start.format();
        $.ajax({
          type: 'post',
          url: base_url + 'calendar/saveData',
          data: {
//            "title": title,
//            "color": color,
//            "start_date": start_date
          },
          success: function(response) {
            if (response == 'Save') {
              alert('Pumasok sa Database Nigga');
            } else {
              alert('Hindi Pumasok Nigga');
            }
          }
        });
        function rgb2hex(rgb){
          rgb = rgb.match(/^rgba?[\s+]?\([\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?/i);
          return (rgb && rgb.length === 4) ? "#" +
            ("0" + parseInt(rgb[1],10).toString(16)).slice(-2) +
            ("0" + parseInt(rgb[2],10).toString(16)).slice(-2) +
            ("0" + parseInt(rgb[3],10).toString(16)).slice(-2) : '';
        }
      },
      eventDrop: function(event, delta, revertFunc) {
        alert(event.title + " was dropped on " + event.start.format());

//        if (!confirm("Are you sure about this change?")) {
//          revertFunc();
//        }

      }
      
    });
  
  });