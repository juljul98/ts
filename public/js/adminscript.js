$(document).ready(function(){
    $('.notifButton').click(function(e){
        e.preventDefault();
        $(this).toggleClass('active');
        $('.dropdown-content').toggleClass('active');
    });
});