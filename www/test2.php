<?php


echo "Detta ar i test filen!! for CloudStorageTools";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    echo "Uppladdningen funkade";
}


  use google\appengine\api\cloud_storage\CloudStorageTools;

  $bucket =CloudStorageTools::getDefaultGoogleStorageBucketName();
  echo $bucket;
  $options = ['gs_bucket_name' => $bucket];


$upload_url = CloudStorageTools::createUploadUrl('/test2', $options);


/*
$url = 'https://eventagious3.appspot.com/api/?user_id_events=2';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HTTPGET, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response_json = curl_exec($ch);
curl_close($ch);
$response=json_decode($response_json, true);
*/

echo "Slutet på Filen";
echo $upload_url
?>
<form action=<?php echo $upload_url ?> enctype="multipart/form-data" method="post">
    Files to upload: <br>
   <input type="file" name="uploaded_files" size="40">
   <input type="submit" value="Send">
</form>