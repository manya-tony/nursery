<?php
require('function.php');
session_start();
session_regenerate_id(true);
if(isset($_SESSION['login']) == false){
header('Location:index.php');
exit();
}
?>

<!-- ヘッド読み込み -->
<?php
$siteTitle = '園児削除完了';
require('head.php');
?>

<?php
  try {
    $child_id = $_POST['id'];

    $dbh = dbConnect();
    $sql = 'DELETE FROM child_list WHERE id=?';
    $stmt = $dbh -> prepare($sql);
    $data[] = $child_id;
    $stmt -> execute($data);

    $dbh = null;

  } catch (Exception $e) {
    echo '<p>障害が発生しています。</p>';
    exit();
  }
?>

<script type="text/javascript">
  alert('園児を削除しました。');
  location.href = 'index.php';
</script>

</body>
</html>
