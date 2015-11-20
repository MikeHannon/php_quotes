<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>
  <form action = "process.php" method = "post">
    <input type = 'text' name = 'first_name'>
    <input type = 'text' name = 'last_name'>
    <input type = 'text' name = 'email'>
    <input type = 'text' name = 'password'>
    <input type = 'hidden' name = 'process_to_occur' value = 'register'>
    <input type = 'submit' value = 'register'>
  </form>
  <form action = "process.php" method = "post">
    <input type = 'text' name = 'email'>
    <input type = 'text' name = 'password'>
    <input type = 'hidden' name = 'process_to_occur' value = 'login'>
    <input type = 'submit' value = 'login'>
  </form>

</body>
</html>
