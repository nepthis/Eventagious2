$(document).ready(function() {
    $("button.remove").on('click', function(e){
  e.preventDefault();

  var id = $(this).data("id");
  var url;
  if ($(e.target).data('action') === 'delete_event_id'){
            url = "https://eventagious3.appspot.com/api/?delete_event_id=" + id;
         }
  else if ($(e.target).data('action') === 'delete_user_id'){
            url = "https://eventagious3.appspot.com/api/?delete_user_id=" + id;
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