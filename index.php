<?php
//var_dump($_FILES['uploaded_files']['tmp_name']);
syslog(LOG_WARNING, "Request came");
require_once 'google/appengine/api/cloud_storage/CloudStorageTools.php';
use google\appengine\api\cloud_storage\CloudStorageTools;
syslog(LOG_WARNING, "Imported Cloud Storage Tools");
//var_dump( $_GET);
$imageName=$_GET["image"];
$size=(int)$_GET["size"];
$project=$_GET["project"];
$cropped=($_GET["cropped"] === 'true');
syslog(LOG_WARNING, "Object URL $object_url");
syslog(LOG_WARNING, "Size $size");
$imageUrl="gs://project-5945470096966003818.appspot.com/projects/$project/full/$imageName";
$resized_image_url = CloudStorageTools::getImageServingUrl($imageUrl,['size' => $size, 'crop' => $cropped]);
syslog(LOG_WARNING, "Output Url $resized_image_url");
header("location: $resized_image_url");

closelog();
?>
