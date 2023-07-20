<?php
 header('Content-Type: image');
 require 'saveImage.php';
 require 'convertImage.php';
 $splitURL = explode('/', $_SERVER["REQUEST_URI"]);
 $context = $splitURL[count($splitURL)-2];
 $entry = $splitURL[count($splitURL)-1];
 $uri = "https://data.uppsalamakerspace.se/store/".$context."/resource/".$entry;
 $file_loc = "../original/".$context."/".$entry;
 $converted_file_loc = "../cache/".$context."/".$entry;
 if (!file_exists($file_loc)) {
   saveImage($uri, $file_loc);
 }
 convertImage($file_loc, $converted_file_loc); 
 readFile($converted_file_loc);
?>
