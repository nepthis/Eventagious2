$(document).ready(function() {
    $("button.remove").on('click', function(e){
  e.preventDefault();

  var id = $(this).data("id");

  if ($(e.target).data('action') === 'delete_event_id'){
            var url = "https://eventagious3.appspot.com/api/?delete_event_id=" + id;
         }
  if ($(e.target).data('action') === 'delete_user_id'){
            var url = "https://eventagious3.appspot.com/api/?delete_user_id=" + id;
         }


  $.ajax({
    method: "DELETE",
    url: url,
    success: function(msg){
        location.reload();
    }
  });
 });
});