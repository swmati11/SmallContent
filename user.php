<?php
require './core/main-core.php';
try {
  $connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
  if($user_info = $connection->query('SELECT * FROM uzytkownicy WHERE id=$_GET["id"]')){
  print_r $user_info;}
} catch (Exception $e) {
  echo 'Wystąpił błąd w pliku: '.__FILE__.' lini: '.__LINE__.' ! ';
}

?>
