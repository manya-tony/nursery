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
$siteTitle = '園児追加完了';
require('head.php');
?>

<?php
  try {
    $child_name = $_POST['name'];
    $child_phonetic = $_POST['phonetic'];
    $child_sex = $_POST['sex'];
    $child_class = $_POST['class'];

    $dbh = dbConnect();
    $sql = 'INSERT INTO child_list (name,phonetic,sex,class) VALUES (?,?,?,?)';
    $stmt = $dbh -> prepare($sql);
    $data[] = $child_name;
    $data[] = $child_phonetic;
    $data[] = $child_sex;
    $data[] = $child_class;
    $stmt -> execute($data);

    $dbh = null;

  } catch (Exception $e) {
    echo '<p>障害が発生しています。</p>';
    exit();
  }
?>

<script type="text/javascript">
  alert('園児を追加しました。');
  location.href = 'index.php';
</script>

</body>
</html>
