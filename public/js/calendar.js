
$(document).ready(function() {

  $("#colorPicker").spectrum({
    showPaletteOnly: true,
    togglePaletteOnly: true,
    togglePaletteMoreText: 'more',
    togglePaletteLessText: 'less',
    color: '#3a87ad',
    palette: [
      ["#000","#444","#666","#999","#ccc","#eee","#f3f3f3","#fff"],
      ["#f00","#f90","#ff0","#0f0","#0ff","#00f","#90f","#f0f"],
      ["#f4cccc","#fce5cd","#fff2cc","#d9ead3","#d0e0e3","#cfe2f3","#d9d2e9","#ead1dc"],
      ["#ea9999","#f9cb9c","#ffe599","#b6d7a8","#a2c4c9","#9fc5e8","#b4a7d6","#d5a6bd"],
      ["#e06666","#f6b26b","#ffd966","#93c47d","#76a5af","#6fa8dc","#8e7cc3","#c27ba0"],
      ["#c00","#e69138","#f1c232","#6aa84f","#45818e","#3d85c6","#674ea7","#a64d79"],
      ["#900","#b45f06","#bf9000","#38761d","#134f5c","#0b5394","#351c75","#741b47"],
      ["#600","#783f04","#7f6000","#274e13","#0c343d","#073763","#20124d","#4c1130"]
    ]
  });

  
  $(document).ajaxComplete(function() {
    var option = '';
    option += '<ul class="optionED">';
    option += '<li><a class="editEvent" href="#"> Edit <i class="material-icons">mode_edit</i></a></li>';
    option += '<li><a class="deleteEvent" href="#"> Erase <i class="material-icons">delete</i></a></li>';
    option += '</ul>';
    console.log();
    $(option).insertAfter($('#calendar').find('.fc-day-grid-event'));
  });
  
  /* initialize the external events
    -----------------------------------------------------------------*/
  $('#external-events .fc-event').each(function() {
    // store data so the calendar knows to render an event upon drop
    $(this).data('event', {
      title: $.trim($(this).text()), // use the element's text as the event title
      stick: true, // maintain when user navigates (see docs on the renderEvent method)
      color: $(this).css('background-color')
    });
    // make the event draggable using jQuery UI
    $(this).draggable({
      zIndex: 999,
      revert: true,      // will cause the event to go back to its
      revertDuration: 0  //  original position after the drag
    });
  });

  $('.newEvent').attr('disabled', 'disabled');
  $('.event-title').keyup(function(){
    if($(this).val() != '') {
      $('.newEvent').removeAttr('disabled');
    } else {
      $('.newEvent').attr('disabled', 'disabled');
    }
  });

  /* add new Event
    -----------------------------------------------------------------*/

  $('.newEvent').click(function(e){
    e.preventDefault();
    var x = $('.event-title').val();
    var y = $('.event-description').val();
    var z = rgb2hex($('.event-color').val());
    if (z == '') {
      z = "#3a87ad";
    }
    var event = '<div data-type="normal" data-status="1" class=\"fc-event\" style=\"background-color:'  + z + '">' + x + '</div><span class=\"evntDesc\">' + y +'</span>';
    $('.list').prepend(event);
    ini_events($('.list').find('.fc-event'));
  });

  /* initialize the calendar
    -----------------------------------------------------------------*/
  $('#calendar').fullCalendar({
    header: {
      left: 'prev,next today',
      center: 'title',
      right: 'month,basicWeek,basicDay'
    },
    eventColor: '#000',
    editable: true,
    droppable: true,

    eventRender: function(event, element, id) { // Options
      element.attr("description",event.description)
      element.bind('click', function(){
        swal({
          title: event.title,
          text: event.description,
        });
      });
      element.bind('contextmenu', function(e){
        e.preventDefault();
        element.parents('.fc-event-container').find('.optionED:first').slideToggle('fast');
      });
      
      $(document).ajaxComplete(function(){ // Delete
        element.siblings().delegate('.deleteEvent','click', function(e){
          e.preventDefault();
  
          swal({    title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel it!",
                closeOnConfirm: false,
                closeOnConfirm: false },
                 function(isConfirm){
                      if(isConfirm) {
                        $.ajax({
                          type: 'delete',
                          url: base_url + 'calendar/removeData/' + event.id,
                          data: {},
                          success: function(response) {
                            if(response == 'Delete') {
                              element.parents('.fc-event-container').find('.optionED').remove();
                              $('#calendar').fullCalendar('refetchEvents');
                              swal("Deleted!", event.title + "Successfully Deleted", "success");
                            }
                          }
                        });
                      } else {
                        swal("Cancelled", "Your imaginary file is safe :)", "error");
                        e.preventDefault();
                        $('.optionED').slideUp();
                      }
          });
        });
      });
      
      $(document).ajaxComplete(function(e){ // Update
        element.siblings().delegate('.editEvent','click', function(e){
          e.preventDefault();
          alert(event.id);
        })
      });
    },
    events: function(start, end, timezone, callback) { // Fetch Data
      $.ajax({
        type: 'get',
        url: base_url + 'calendar/getData',
        data: {},
        success: function(data) {
          var loop = data.length;
          var events = [];
          for( x=0; x < loop; x++ ){
            var new_title, new_description;
            if(data[x].status == 0) {
              new_title = '(Pending) ' + data[x].title;
              new_description = 'Wait for the approval of the manager or team leader';
            } else {
              new_title = data[x].title;
              new_description = 'Your leave is on ' + data[x].start_date;
            }
            events.push({
              title: new_title,
              description: new_description,
              color: data[x].color,
              start: data[x].start_date,
              id: data[x].id,
              status: data[x].status
            });
          }
          callback(events);
        }
      });
    },

    drop: function (start, end, allDay, delta, event) { // Save Data to database
      var title = $(this).text(),
          color = rgb2hex($(this).css('background-color')),
          start_date = start.format(),
          description = $('.evntDesc').text(),
          data_type = $(this).data('type');
          data_status = $(this).data('status');
            $.ajax({
              type: 'post',
              url: base_url + 'calendar/saveData',
              data: {
                "title": title,
                "description": description,
                "color": color,
                "start_date": start_date,
                "data_type": data_type,
                "data_status" : data_status
              },
              success: function(response) {
                if (response == 'Save') {
                  swal("Save the Date", title + " successfully saved", "success");
                }
              }
              
            });
          },
    
    eventDrop: function(event, delta, revertFunc) {
      alert(event.title + " was dropped on " + event.start.format());
      //        if (!confirm("Are you sure about this change?")) {
      //          revertFunc();
      //        }
    }
  });
  
  function rgb2hex(rgb){
    rgb = rgb.match(/^rgba?[\s+]?\([\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?/i);
    return (rgb && rgb.length === 4) ? "#" +
      ("0" + parseInt(rgb[1],10).toString(16)).slice(-2) +
      ("0" + parseInt(rgb[2],10).toString(16)).slice(-2) +
      ("0" + parseInt(rgb[3],10).toString(16)).slice(-2) : '';
  }

  function ini_events(ele) {
    ele.each(function (arr) {
      // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
      // it doesn't need to have a start or end
      var eventObject = {
        title: $.trim($(this).text()) // use the element's text as the event title
      };
      // store the Event Object in the DOM element so we can get to it later
      $(this).data('eventObject', eventObject);
      // make the event draggable using jQuery UI
      $(this).draggable({
        zIndex: 1070,
        revert: true, // will cause the event to go back to its
        revertDuration: 0  //  original position after the drag
      });
    });
  }
  ini_events($('.list').find('.fc-event'));
});