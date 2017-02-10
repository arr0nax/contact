$(function() {
  $('.contact').click(function(e) {
    var clicked = $(this).attr('id');
    $.post('/select_contact', {clicked: clicked}, function(response){
      $('.edit_contact'+clicked).html(response);
    });
  });
});
