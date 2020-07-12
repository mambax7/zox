<?php 
function zen_zox_replace_https($text){
  $text = str_replace(HTTP_SERVER, HTTPS_SERVER, $text[0]);
  return $text;
}
?>
