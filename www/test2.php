<?php


/*
$url = 'https://eventagious3.appspot.com/api/?user_id_events=2';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HTTPGET, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response_json = curl_exec($ch);
curl_close($ch);
$response=json_decode($response_json, true);
*/

?>


<html>
<body>
<form action="https://eventagious3.appspot.com/api/?insertImg=1" method="post" enctype="multipart/form-data">
  Send these files:<p/>
  <input name="file" type="file" multiple="multiple"/><p/>
  <input name="EventID" type="text" id="EventID" placeholder="EventID" value="12"/><p/>
  <input name="FileName" type="text" id="FileName" placeholder="FileName" value="file"/><p/>
  <input type="submit" value="Send files" />
</form>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function (e) {
    $('#imageUploadForm').on('submit',(function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            type:'POST',
            url: $(this).attr('action'),
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                console.log("success");
                console.log(data);
            },
            error: function(data){
                console.log("error");
                console.log(data);
            }
        });
    }));

    $("#ImageBrowse").on("change", function() {
        $("#imageUploadForm").submit();
    });
});

	
</script>