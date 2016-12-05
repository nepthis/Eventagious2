<?php
require_once 'google/appengine/api/cloud_storage/CloudStorageTools.php';
use google\appengine\api\cloud_storage\CloudStorageTools;
echo "Detta ar i test filen!! for CloudStorageTools";



if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    echo "Klart";
}

/*
$bucket =CloudStorageTools::getDefaultGoogleStorageBucketName();
$options = ['gs_bucket_name' => $bucket];
echo $bucket;

$upload_url = CloudStorageTools::createUploadUrl('/test2', $options);*/

echo "Skickar datan  :";
// Build a new entity
$obj_book = new GDS\Entity();
$obj_book->title = 'Romeo and Juliet';
$obj_book->author = 'William Shakespeare';
$obj_book->isbn = '1840224339';

// Write it to Datastore
$obj_store = new GDS\Store('Book');
$obj_store->upsert($obj_book);

echo "Nu testar vi att skriva ut datan igen.....";
$obj_store = new GDS\Store('Book');
foreach($obj_store->fetchAll() as $obj_book2) {
    echo "Title: {$obj_book2->title}, ISBN: {$obj_book2->isbn} <br />", PHP_EOL;
}

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

?>
<form action=<?php echo $upload_url?> enctype="multipart/form-data" method="post">
    Files to upload: <br>
   <input type="file" name="uploaded_files" size="40">
   <input type="submit" value="Send">
</form>