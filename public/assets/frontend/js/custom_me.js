$(document).ready(function(){
  $('ul.tabs li').click(function(){
        console.log('hello');
        var tab_id = $(this).attr('href');
        $('ul.tabs li').removeClass('current');
        $('.tab-content').removeClass('current');

        $(this).addClass('current');
        $("#" + tab_id).addClass('current');
  });
});