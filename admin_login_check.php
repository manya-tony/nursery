<?php
require('function.php');

try {
  $admin_name = $_POST['name'];
  $admin_pass = $_POST['pass'];

  $admin_name = htmlspecialchars($admin_name, ENT_QUOTES, 'UTF-8');
  $admin_pass = htmlspecialchars($admin_pass, ENT_QUOTES, 'UTF-8');

  $dbh = dbConnect();
  $sql = 'SELECT name FROM admin WHERE name=? AND password=?';
  $stmt = $dbh -> prepare($sql);
  $data[] = $admin_name;
  $data[] = $admin_pass;
  $stmt -> execute($data);

  $dbh = null;

  $rec = $stmt -> fetch(PDO::FETCH_ASSOC);

  session_start();
  $_SESSION['login'] = 1;
  $_SESSION['admin_name'] = $rec['name'];
  header('Location:index.php');
  exit();

} catch (Exception $e) {
  echo '<p>障害が発生しています。</p>';
  exit();
}
?>

<!-- ヘッド読み込み -->
<?php
$siteTitle = '管理者ログインチェック';
require('head.php');
?>

<!-- ヘッダー読み込み -->
<?php
require('header.php');
?>

<div class="container">
  <h3 id="login_title">ログイン</h3>
  <?php
  if($rec == false){
      echo '<form class="login_form">';
      echo '<p class="error_text">管理者名もしくはパスワードが間違っています。</p>';
      echo '<input class="button back" type="button" onclick="history.back()" value="もどる">';
      echo '</form>';
    }
  ?>
</div>
  
<!-- ヘッダー読み込み -->
<?php
require('footer.php');
?>
