<?php
session_start();
require_once('connection.php');

#crud methods for our DB:
#users CRUD
function index_users()
{
#go to the users table and get all from users:
$query = 'SELECT * FROM users';
return fetch_all(query);
}
#returns an index array with associative arrays inside it.

function show_user($data)
{
  $keys = '';
  $values = '';
  foreach ($data as $key => $value)
  {
    $keys .= $key;
    $values .= "'".$value."'";
  }
$query = "SELECT * FROM users where {$key} = '{$value}'";

return fetch_record($query);
}

function delete_user($id)
{
$query = 'DELETE FROM users where id = $id';
run_mysql_query($query);
}

function update_user($id, $data)
{
  # data is an associative array with keys and values
  #let's create a string that says: key = value
  $things_to_update = "";
  foreach ($data as $key => $value)
  {
    $things_to_update .= $key . "='" . $value . "',";
  }
  $query = "UPDATE users SET ".$things_to_update." updated_at = now() WHERE id = $id";
  run_mysql_query($query);
}

function create_user($data)
{
  # data again is an associative array with key values
  # we need a set of keys and a set of values # just doing strings here!
  # how would you do other thigns than strings???
  $keys = "";
  $values = "";
  foreach ($data as $key => $value)
  {
    $keys .= $key.",";
    $values .= "'".$value."',";
  }
  $query = "INSERT into users (".$keys." created_at, updated_at) values (".$values." now(), now())";
  run_mysql_query($query);
}

function create_quote($data)
{
  # data again is an associative array with key values
  # we need a set of keys and a set of values # just doing strings here!
  # how would you do other thigns than strings???
  $keys = "";
  $values = "";
  foreach ($data as $key => $value)
  {
    $keys .= $key.",";
    $values .= "'".$value."',";
  }
  $query = "INSERT into quotes (".$keys." created_at, updated_at) values (".$values." now(), now())";
  run_mysql_query($query);
}

if (isset($_POST) && isset($_POST['process_to_occur']))
{
  if ($_POST['process_to_occur'] == 'register'){
    $data = ['first_name' => $_POST['first_name'],
            'last_name' => $_POST['last_name'],
            'email' => $_POST['email'],
            'password' => $_POST['password']
            ];
    create_user($data);
    $data = ['email' => $_POST['email']];
    $_SESSION['user'] =show_user($data);
  }
  else if ($_POST['process_to_occur'] == 'login'){
    $data = ['email' => $_POST['email']];
    $_SESSION['user'] =show_user($data);
  }
  else if ($_POST['process_to_occur'] == 'create_quote'){
    $data = ['title' => $_POST['title'],
            'quote' => $_POST['quote'],
            'user_id' => $_SESSION['user']['id']];
    create_quote($data);
  }
}

header('Location:user_index.php');
exit();

#quotes table

#joined table
?>
