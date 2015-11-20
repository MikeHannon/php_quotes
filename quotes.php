<?php
session_start();
require_once('connection.php');
function index_quotes()
  {
  #go to the users table and get all from users:
  $query = 'SELECT * FROM quotes left join users on quotes.user_id = users.id';
  return fetch_all($query);
  }


// require_once('process.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>
    <?php if (isset($_SESSION['user']))
    {
    ?>
  <h2><?= $_SESSION['user']['first_name'] . " ". $_SESSION['user']['last_name']?> <h2>
    <?php
    }
    ?>
  <h1>Future Quotes Here</h1>
  <form action = 'process.php' method = 'post'>
    <input type = 'text' name = 'title'>
    <input type = 'text' name = 'quote'>
    <input type = 'hidden' name = 'process_to_occur' value = 'create_quote'>
    <input type = 'submit' value = 'submit'>
  </form>
  <?php $quotes = (index_quotes());
  for ($i =0; $i < count($quotes); $i ++)
  { ?>
    <h5> <?= $quotes[$i]['title'] ?></h5>
      <p> <?= $quotes[$i]['quote'] ?> <span><b> <?= $quotes[$i]['first_name'] ?></b></span></p>
<?php
  }
   ?>
</body>
</html>
