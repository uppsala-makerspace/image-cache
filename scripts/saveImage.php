<?php

function saveImage($url, $file_loc) {
  $dirname = dirname($file_loc);
  if (!is_dir($dirname)) {
     mkdir($dirname, 0755, true);
  }

  // Initialize the cURL session
  $ch = curl_init($url);

  // Open file
  $fp = fopen($file_loc, 'wb');

  // It set an option for a cURL transfer
  curl_setopt($ch, CURLOPT_FILE, $fp);
  curl_setopt($ch, CURLOPT_HEADER, 0);

  // Perform a cURL session
  curl_exec($ch);

  // Closes a cURL session and frees all resources
  curl_close($ch);

  // Close file
  fclose($fp);
}
