<?php
 function convertImage($fromFile, $toFile) {
   $dirname = dirname($toFile);
   if (!is_dir($dirname)) {
     mkdir($dirname, 0755, true);
   }

   $image=new Imagick($fromFile);
   $image->adaptiveResizeImage(100, 3000, true);
   $image->writeImage($toFile);
 }
?>