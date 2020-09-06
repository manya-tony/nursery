<!-- ヘッド読み込み -->
<?php
require('function.php');

$siteTitle = '登園完了';
require('head.php');
?>

<?php
  try {
    $child_id = $_POST['id'];
    $pickup_time = $_POST['pickup_time'];
    $person = $_POST['person'];

    date_default_timezone_set('Asia/Tokyo');
    $date = new DateTime();
    $enter_time = $date -> format('Y-m-d H:i:s');

    $dbh = dbConnect();
    $sql = 'INSERT INTO child_stamp (child_id, enter_time, out_time, pickup_time, person) VALUES (?,?,?,?,?)';
    $stmt = $dbh -> prepare($sql);
    $data[] = $child_id;
    $data[] = $enter_time;
    $data[] = $enter_time;
    $data[] = $pickup_time;
    $data[] = $person;
    $stmt -> execute($data);

    $dbh = null;

  } catch (Exception $e) {
    echo '<p>障害が発生しています。</p>';
    exit();
  }
?>

<script type="text/javascript">
  alert('登園を受け付けました。');
  location.href = 'index.php';
</script>

</body>
</html>
