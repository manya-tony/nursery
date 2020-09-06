<?php
require('function.php');
session_start();
session_regenerate_id(true);
?>

<!-- ヘッド読み込み -->
<?php
$siteTitle = '登園';
require('head.php');
?>

<!-- ヘッダー読み込み -->
<?php
require('header.php');
?>

<div class="container">
  <?php
    try {
      $child_id = $_GET['id'];

      $dbh = dbConnect();
      $sql = 'SELECT name,class,phonetic FROM child_list WHERE id=?';
      $stmt = $dbh -> prepare($sql);
      $data[] = $child_id;
      $stmt -> execute($data);

      $dbh = null;

      $rec = $stmt -> fetch(PDO::FETCH_ASSOC);
      $child_name = $rec['name'];
      $child_class = $rec['class'];
      $child_phonetic = $rec['phonetic'];

      date_default_timezone_set('Asia/Tokyo');
      $week = array('日','月','火','水','木','金','土');
      echo '<p class="time">'.date('Y年n月j日('.$week[date('w')].')G時i分').'</p>';

      echo '<p class="child_stamp_waku">園児名</p>';
      echo '<p class="child_stamp_name">'.$child_name.'</p>';
      echo '<p class="child_stamp_phonetic">'.$child_phonetic.'</p>';
      echo '<p class="child_stamp_waku">クラス</p>';
      echo '<p class="child_stamp_class">'.$child_class.'ぐみ</p>';

      echo '<br>';

      echo '<form method="post" action="child_in_done.php">';
      echo '<input type="hidden" name="id" value="'.$child_id.'">';

      echo '<p class="child_stamp_waku">お迎え時間</p>';
      echo '<select name="pickup_time">';
      echo '<option value="16時">16時</option>';
      echo '<option value="16時半">16時半</option>';
      echo '<option value="17時">17時</option>';
      echo '<option value="17時半">17時半</option>';
      echo '<option value="18時">18時</option>';
      echo '<option value="18時半">18時半</option>';
      echo '<option value="19時">19時</option>';
      echo '</select>';
      echo '<br><br>';

      echo '<p class="child_stamp_waku">お迎えに来る人</p>';
      echo '<select name="person">';
      echo '<option value="母">母</option>';
      echo '<option value="父">父</option>';
      echo '<option value="祖母">祖母</option>';
      echo '<option value="祖父">祖父</option>';
      echo '<option value="その他">その他</option>';
      echo '</select>';
      echo '<br><br><br>';

      echo '<input type="submit" value="登園" class="enter_button button">';

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
