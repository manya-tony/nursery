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
$siteTitle = '園児詳細';
require('head.php');
?>

<!-- ヘッダー読み込み -->
<?php
require('header.php');
?>

<div class="container">
  <h2 class="title">園児詳細</h2>

    <?php
      try {
        $child_id = $_GET['id'];

        $dbh = dbConnect();
        $sql = 'SELECT * FROM child_list,child_stamp WHERE child_list.id=? AND child_stamp.child_id=? ORDER BY child_stamp.id DESC LIMIT 1';
        $stmt = $dbh -> prepare($sql);
        $data[] = $child_id;
        $data[] = $child_id;
        $stmt -> execute($data);

        $dbh = null;

        $rec = $stmt -> fetch(PDO::FETCH_ASSOC);

        $child_name = $rec['name'];
        $child_phonetic = $rec['phonetic'];
        $child_sex = $rec['sex'];
        $child_class = $rec['class'];
        $enter_time = $rec['enter_time'];
        $out_time = $rec['out_time'];
        $pickup_time = $rec['pickup_time'];
        $person = $rec['person'];

        echo '<form>';
        echo '<p class="child_stamp_waku">園児ID</p>';
        echo '<p class="child_stamp_name">'.$child_id.'</p>';
        echo '<p class="child_stamp_waku">園児名</p>';
        echo '<p class="child_stamp_name">'.$child_name.'</p>';
        echo '<p class="child_stamp_phonetic">'.$child_phonetic.'</p>';
        echo '<p class="child_stamp_waku">性別</p>';
        echo '<p class="child_stamp_name">'.$child_sex.'</p>';
        echo '<p class="child_stamp_waku">クラス</p>';
        echo '<p class="child_stamp_name">'.$child_class.'ぐみ</p>';
        echo '<p class="child_stamp_waku">登園時間</p>';
        echo '<p class="child_stamp_name">'.$enter_time.'</p>';
        echo '<p class="child_stamp_waku">お迎え時間</p>';
        echo '<p class="child_stamp_name">'.$pickup_time.'</p>';
        echo '<p class="child_stamp_waku">お迎えに来る人</p>';
        echo '<p class="child_stamp_name">'.$person.'</p>';
        echo '<p class="child_stamp_waku">降園時間</p>';
        echo '<p class="child_stamp_name">'.$out_time.'</p>';
        echo '</form>';

        echo '<p class="back_to"><a href="index.php">園児リストにもどる</a></p>';
        
      } catch (Exception $e) {
        echo '<p>障害が発生しています。</p>';
        exit();
      }
    ?>
</div>

<!-- フッター読み込み -->
<?php
require('footer.php');
?>
