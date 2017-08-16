<?php
require_once 'core/init.php';

if (Session::exists('home')) {
  echo Session::flash('home');
}

$user = new User();

if ($user->isLoggedIn()) {
  ?>
  <p>Hello <a href="profile.php?user=<?php echo $user->data()->username; ?>"><?php echo $user->data()->username; ?></a></p>
  <ul>
    <li><a href='update.php'>Update info</a></li>
    <li><a href='changepassword.php'>Change password</a></li>
    <li><a href='logout.php'>Logout</a></li>
  </ul>
  <?php
  if ($user->hasPermission('admin')) {
    echo "you're an admin";
  }
} else {
  echo "<p>Please <a href='login.php'>Login</a>, or <a href='register.php'>Register</a></p>";
}
