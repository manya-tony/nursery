<?php
require('function.php');
session_start();
session_regenerate_id(true);
?>

<!-- ヘッド読み込み -->
<?php
$siteTitle = 'さくらぐみ';
require('head.php');
?>

<!-- ヘッダー読み込み -->
<?php
require('header.php');
?>

<!-- クラスリスト読み込み -->
<?php
require('class_list.php');
?>

<main>
  <!-- 園児リスト -->
  <div class="child_list">
    <?php
      try {
        $dbh = dbConnect();
        $sql = "SELECT id,name,phonetic,class FROM child_list WHERE class='さくら'";
        $stmt = $dbh -> prepare($sql);
        $stmt -> execute();

        $dbh = null;

        echo '<div class="child_list_class">さくらぐみ</div>';
        echo '<ul class="child_wrap">';
        while(true){
          $rec = $stmt -> fetch(PDO::FETCH_ASSOC);
          if($rec == false){
            break;
          }
          echo '<li class="child class05">';
          echo '<a href="child_stamp.php?id='.$rec['id'].'">'.$rec['name'].'<span class="phonetic">'.$rec['phonetic'].'</span></a>';
          echo '</li>';
        }
        echo '</ul>';

        } catch (Exception $e) {
          echo '<p>障害が発生しています。</p>';
          exit();
        }
      ?>
  </div>
</main>

<!-- フッター読み込み -->
<?php
require('footer.php');
?>
