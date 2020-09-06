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
$siteTitle = '園児削除';
require('head.php');
?>

<!-- ヘッダー読み込み -->
<?php
require('header.php');
?>

<div class="container">
  <h2 class="title">園児削除</h2>
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

        echo '<form method="post" action="child_delete_done.php">';
        echo '<p class="child_stamp_waku">園児ID</p>';
        echo '<p class="child_stamp_name">'.$child_id.'</p>';
        echo '<p class="child_stamp_waku">園児名</p>';
        echo '<p class="child_stamp_name">'.$child_name.'</p>';
        echo '<p class="child_stamp_phonetic">'.$child_phonetic.'</p>';
        echo '<p class="child_stamp_waku">性別</p>';
        echo '<p class="child_stamp_name">'.$child_sex.'</p>';
        echo '<p class="child_stamp_waku">クラス</p>';
        echo '<p class="child_stamp_name">'.$child_class.'ぐみ</p>';
        echo '<input type="hidden" name="id" value="'.$child_id.'">';
        echo '<p class="check_text">削除しますか？</p>';
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
