$(document).ready(function() {
    $("button.remove").on('click', function(e){
  e.preventDefault();

  var EventID = $(this).data("action");
  var settings = {
    "async": true,
    "crossDomain": true,
    "url": "https://eventagious3.appspot.com/api/?delete_event_id="+ EventID,
    "method": "DELETE",
    "headers": {
      "cache-control": "no-cache",
      }
    }
    $.ajax(settings).done(function (response) {
      console.log(response);
    });
  });
});    

/*

$(document).ready(function() {
    $("button.remove").on('click', function(e){
  e.preventDefault();

  var EventID = $(this).data("action");
  var url = "https://eventagious3.appspot.com/api/?delete_event_id="+ EventID;
  $.ajax({
   type: "POST",
   async: true,
   crossDomain: true,
   url: url,
   data: {_method: 'DELETE'},

   beforeSend : function()
   {
    //$("#preview").fadeOut();
    $("#err").fadeOut();
   },
   success: function(data)
      {
    if(data=='invalid file')
    {
      console.log("Fel i datan...");
     // invalid file format.
     //$("#err").html("Invalid File !").fadeIn();
    }
    else
    {
     // view uploaded file.
     console.log("det funkar...");
     //$("#preview").html(data).fadeIn();
     //$("#form")[0].reset(); 
    }
      },
     error: function(e) 
      {
      console.log("Error!...");
    //$("#err").html(e).fadeIn();
      }          
    });
 });
});*/