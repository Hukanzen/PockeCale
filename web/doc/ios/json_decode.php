<?php

  $json = json_decode($_POST['json'],TRUE);
  
  echo "key1 : ".$json['key1'];

?>
