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
$siteTitle = '園児修正';
require('head.php');
?>

<!-- ヘッダー読み込み -->
<?php
require('header.php');
?>

<div class="container">
  <h2 class="title">園児修正</h2>

    <?php
    try {
      $child_id = $_GET['id'];

      $dbh = dbConnect();
      $sql = 'SELECT name,phonetic,sex,class FROM child_list WHERE id=?';
      $stmt = $dbh -> prepare($sql);
      $data[] = $child_id;
      $stmt -> execute($data);

      $dbh = null;

      $rec = $stmt -> fetch(PDO::FETCH_ASSOC);
      $child_name = $rec['name'];
      $child_phonetic = $rec['phonetic'];
      $child_sex = $rec['sex'];
      $child_class = $rec['class'];

      echo '<form method="post" action="child_edit_done.php">';

      echo '<input type="hidden" name="id" value="'.$child_id.'">';

      echo '<p class="child_stamp_waku">園児名</p>';
      echo '<input class="login_text" type="text" name="name" value="'.$child_name.'" require>';
      echo '<br>';
      echo '<p class="child_stamp_waku">ふりがな</p>';
      echo '<input class="login_text" type="text" name="phonetic" value="'.$child_phonetic.'" require>';
      echo '<br>';
      echo '<p class="child_stamp_waku">性別</p>';
      echo '<input type=radio name="sex" value="男の子" checked>男の子';
      echo '<input type=radio name="sex" value="女の子">女の子';
      echo '<br>';
      echo '<p class="child_stamp_waku">クラス</p>';
      echo '<input type="radio" name="class" value="すみれ" checked>すみれ';
      echo '<input type="radio" name="class" value="たんぽぽ">たんぽぽ';
      echo '<input type="radio" name="class" value="ひまわり">ひまわり<br>';
      echo '<input type="radio" name="class" value="ゆり">ゆり';
      echo '<input type="radio" name="class" value="もも">もも';
      echo '<input type="radio" name="class" value="さくら">さくら';


      echo '<p class="check_text">修正しますか？</p>';
      echo '<input class="button enter_button" type="submit" value="OK">';
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
