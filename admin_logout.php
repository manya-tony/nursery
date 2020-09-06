<?php
session_start();
$_SESSION = array();
if(isset($_COOKIE[session_name()]) == true){
  setcookie(session_name(), '', time()-42000, '/');
}
session_destroy();
?>

<!-- ヘッド読み込み -->
<?php
$siteTitle = '管理者ログアウト';
require('head.php');
?>

    <script type="text/javascript">
      alert('ログアウトしました。');
      location.href= 'index.php';
    </script>
    
  </body>
</html>
