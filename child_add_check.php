<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['login']) == false){
header('Location:index.php');
exit();
}
?>

<!-- ヘッド読み込み -->
<?php
$siteTitle = '園児確認';
require('head.php');
?>

<!-- ヘッダー読み込み -->
<?php
require('header.php');
?>

<div class="container">
  <h2 class="title">園児追加/確認</h2>
  <?php
    $child_name = $_POST['name'];
    $child_phonetic = $_POST['phonetic'];
    $child_sex = $_POST['sex'];
    $child_class = $_POST['class'];

    echo '<p class="child_stamp_waku">園児名</p>';
    echo '<p class="child_stamp_name">'.$child_name.'</p>';
    echo '<p class="child_stamp_waku">ふりがな</p>';
    echo '<p class="child_stamp_name">'.$child_phonetic.'</p>';
    echo '<p class="child_stamp_waku">性別</p>';
    echo '<p class="child_stamp_name">'.$child_sex.'</p>';
    echo '<p class="child_stamp_waku">クラス</p>';
    echo '<p class="child_stamp_name">'.$child_class.'ぐみ</p>';

    echo '<p class="check_text">追加しますか？</p>';

    echo '<form action="child_add_done.php" method="post">';
    echo '<input type="hidden" name="name" value="'.$child_name.'">';
    echo '<input type="hidden" name="phonetic" value="'.$child_phonetic.'">';
    echo '<input type="hidden" name="sex" value="'.$child_sex.'">';
    echo '<input type="hidden" name="class" value="'.$child_class.'">';
    echo '<input class="button out_button" type="button" onclick="history.back()" value="もどる">';
    echo '<input class="button enter_button" type="submit" value="OK">';
    echo '</form>';
  ?>
</div>

<!-- ヘッダー読み込み -->
<?php
require('footer.php');
?>
