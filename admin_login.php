<!-- ヘッド読み込み -->
<?php
$siteTitle = '管理者ログイン';
require('head.php');
?>

<!-- ヘッダー読み込み -->
<?php
require('header.php');
?>

<div class="container">
  <h2 class="title">ログイン</h2>
  <form action="admin_login_check.php" method="post">
    <input class="login_text" type="text" name="name" placeholder="管理者名" required>
    <input class="login_text" type="password" name="pass" placeholder="パスワード" required><br />
    <input class="button ok" type="submit" value="OK">
  </form>
</div>

<!-- ヘッダー読み込み -->
<?php
require('footer.php');
?>
