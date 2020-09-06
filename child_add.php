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
$siteTitle = '園児追加';
require('head.php');
?>

<!-- ヘッダー読み込み -->
<?php
require('header.php');
?>

<div class="container">
  <h2 class="title">園児追加</h2>
  <form class="login_form" action="child_add_check.php" method="post">
    <input class="login_text" type="text" name="name" placeholder="園児名" required>
    <input class="login_text" type="text" name="phonetic" placeholder="ふりがな" required>

    <p class="child_stamp_waku">性別</p>
    <input type="radio" name="sex" value="男の子" checked>男の子
    <input type="radio" name="sex" value="女の子">女の子
    <br>

    <p class="child_stamp_waku">クラス</p>
    <input type="radio" name="class" value="すみれ" checked>すみれ
    <input type="radio" name="class" value="たんぽぽ">たんぽぽ
    <input type="radio" name="class" value="ひまわり">ひまわり<br>
    <input type="radio" name="class" value="ゆり">ゆり
    <input type="radio" name="class" value="もも">もも
    <input type="radio" name="class" value="さくら">さくら
    <br><br>
    <input class="button ok" type="submit" value="OK">
  </form>
</div>

<!-- ヘッダー読み込み -->
<?php
require('footer.php');
?>
