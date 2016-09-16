$(document).ready(function(){
    $('.notifButton').click(function(e){
        e.preventDefault();
        $(this).toggleClass('active');
        $('.dropdown-content').toggleClass('active');
    });
    // $('html').on('contextmenu', function(e){
    // 	e.preventDefault();
    // 	alert('Unable to process your request');
    // });


});