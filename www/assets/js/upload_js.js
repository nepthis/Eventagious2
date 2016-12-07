$(document).ready(function (e) {
 $("#form").on('submit',(function(e) {
  e.preventDefault();
  $.ajax({
         url: "https://eventagious3.appspot.com/api/?insertImg=1",
   type: "POST",
   data:  new FormData(this),
   contentType: false,
         cache: false,
   processData:false,
   beforeSend : function()
   {
    //$("#preview").fadeOut();
    $("#err").fadeOut();
   },
   success: function(data)
      {
    if(data=='invalid file')
    {
      console.log("del i datan...");
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
 }));
});