<?php
require_once 'core/init.php';

if (!$username = Input::get('user')) {
  Redirect::to('index.php');
} else {
  $user = new User($username);
  if (!$user->exists()) {
    Redirect::to(404);
  } else {
    $data = $user->data();
  }
  ?>
  <h3>username: <?php echo escape($data->username); ?></h3>
  <h3>full name: <?php echo escape($data->name); ?></h3>
  <?php
}
