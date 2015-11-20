<?php
  session_start();
  require_once('connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <style>
    #forms{
      width: 40%;
      display:inline-block;
      border: 1px solid black;
      height: 60%;
    }
    #index{
      width: 40%;
      display:inline-block;
      border: 1px solid black;
      max-height: 800px;
      overflow-y: scroll;
      vertical-align: top;
    }
  </style>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>
  <div id = 'forms'>
    <fieldset>
      <legend>NEW USER</legend>
        <form action = "process.php" method = "post">
          <ul>
            <li>
              <input type = 'text' name = 'first_name' placeholder = 'first name'>
            </li>
            <li>
            <input type = 'text' name = 'last_name' placeholder = 'last name'>
            </li>
            <li>
            <input type = 'text' name = 'email' placeholder = 'email'>
            </li>
            <li>
            <input type = 'text' name = 'password' placeholder = 'password'>
            </li>
            <li>
            <input type = 'hidden' name = 'process_to_occur' value = 'register'>
            </li>
            <li>
            <input type = 'submit' value = 'register (CREATE USER)'>
            </li>
          </ul>
        </form>
    </fieldset>
    <fieldset>
      <legend> SHOW USER</legend>
        <form action = "process.php" method = "post">
          <ul>
            <li>
              <input type = 'text' name = 'email' placeholder = 'email'>
            </li>
            <li>
              <input type = 'text' name = 'password' placeholder = 'password'>
            </li>
            <li>
              <input type = 'hidden' name = 'process_to_occur' value = 'login'>
            </li>
            <li>
              <input type = 'submit' value = 'login (SHOW USER)'>
            </li>
          </ul>
        </form>
    </fieldset>
  </div>

  <div id = 'index'>
    <fieldset>
      <legend>INDEX</legend>
  <p>  function index_users() </p>
  <p>  { </p>
  <p>  $query = 'SELECT * FROM users'; </p>
  <p>  return fetch_all(query); </p>
  <p>  } </p>
    <?php
    function index_users()
    {
    #go to the users table and get all from users:
    $query = 'SELECT * FROM users';
    return fetch_all($query);
    }
    $myUsers = index_users();
    // var_dump($myUsers);
    ?>
    <table>
      <tr>
        <td>ID</td>
        <td>First Name</td>
        <td>Last Name</td>
        <td>Password</td>
      </tr>
    <?php
      foreach ($myUsers as $key => $value){
      ?>
      <tr>
        <td><?= $value['id'] ?></td>
        <td><?= $value['first_name'] ?></td>
        <td><?= $value['last_name'] ?></td>
        <td><?= $value['password'] ?></td>
      </tr>

      <?php
        }
      ?>
    </table>
  </fieldset>
  </div>
  <div>
    <p>
    function create_user(){
    </p>
      <p> $query = 'INSERT into users </p>
      <p> (first_name, last_name, password, created_at, update_at) value ('michael', 'hannon', '1234', now(), now())'; </p>
      <p>  run_mysql_query($query); </p>
    <p> } </p>
  </div>
  <div>
    <p>
      function show_user(){
        $query = 'SELECT * from users where email = 'asdf' limit 1';
        return fetch_record($query);
      }
    </p>
  </div>
</body>
</html>
