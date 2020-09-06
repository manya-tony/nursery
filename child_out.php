<!-- ヘッド読み込み -->
<?php
require('function.php');

$siteTitle = '降園完了';
require('head.php');
?>

<?php
  try {
    $child_id = $_GET['id'];

    date_default_timezone_set('Asia/Tokyo');
    $date = new DateTime();
    $out_time = $date -> format('Y-m-d H:i:s');

    $dbh = dbConnect();
    $sql = 'UPDATE child_stamp SET out_time=? WHERE child_id=? ORDER BY id DESC LIMIT 1';
    $stmt = $dbh -> prepare($sql);
    $data[] = $out_time;
    $data[] = $child_id;
    $stmt -> execute($data);

    $dbh = null;

  } catch (Exception $e) {
    echo '<p>障害が発生しています。</p>';
    exit();
  }
?>

<script type="text/javascript">
  alert('降園を受け付けました。');
  location.href = 'index.php';
</script>

</body>
</html>
