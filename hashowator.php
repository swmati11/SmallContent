<?php
if (isset($_POST['password'}])){
  $passwordB = $_POST['password'];
  $password = PASSWORD_HASH($passwordB, PASSWORD_DEFAULT);
  echo $password;
}
else {
echo '<form method="post" /><input type="password" name="password" placeholder="Hasło"/><br /><input type="submit" value="Zahashuj hasło!" /></form>'
}
?>
