<?php
require('function.php');
session_start();
session_regenerate_id(true);
?>

<!-- ヘッド読み込み -->
<?php
$siteTitle = '登園＆降園';
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
    $sql = 'SELECT name,phonetic,class FROM child_list WHERE id=?';
    $stmt = $dbh -> prepare($sql);
    $data[] = $child_id;
    $stmt -> execute($data);

    $dbh = null;

    $rec = $stmt -> fetch(PDO::FETCH_ASSOC);
    $child_name = $rec['name'];
    $child_phonetic = $rec['phonetic'];
    $child_class = $rec['class'];

    date_default_timezone_set('Asia/Tokyo');
    $week = array('日','月','火','水','木','金','土');
    echo '<p class="time">'.date('Y年n月j日('.$week[date('w')].')G時i分').'</p>';

    echo '<p class="child_stamp_waku">園児名</p>';
    echo '<p class="child_stamp_name">'.$child_name.'</p>';
    echo '<p class="child_stamp_phonetic">'.$child_phonetic.'</p>';
    echo '<p class="child_stamp_waku">クラス</p>';
    echo '<p class="child_stamp_class">'.$child_class.'ぐみ</p>';

    echo '<form method="post" action="child_branch.php">';
      echo '<input type="hidden" name="id" value="'.$child_id.'">';
      echo '<br>';
      echo '<input type="submit" value="登園" name="in" class="enter_button button">';
      echo '<input type="submit" value="降園" name="out" class="out_button button"><br>';


      if(isset($_SESSION['login'])){
        echo '<input type="submit" value="詳細" name="detail" class="other_button">';
        echo '<input type="submit" value="修正" name="edit" class="other_button">';
        echo '<input type="submit" value="削除" name="delete" class="other_button">';
      }
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
</html>
